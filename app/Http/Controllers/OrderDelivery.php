<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDelivery extends Controller
{
    //
      public  $PackageSizesList =array(250,500,1000,2000,5000);
      public  $packList = array();
   	  public  $inputOrder = 0; 	
  	  public  $maxSize; 
   	    	  
   

    /**
     * Order Delivery constructor
     * @param @inputOrder; // POST submit value of input
     * @param $PackageSizesList, the sizes of each packet in ascending order
     */
    public function __construct(Request $request){
        $this->inputOrder = $request->input('inputOrder');                 
       sort($this->PackageSizesList); // make sure the array is in ascending order
      $this->maxSize = count($this->PackageSizesList) -1; //  array index start with 0
    }

    /**Set the LowerRange Value as per the Input Request
     *
     * @param $inputOrder
     * @return $i, the index of the packet of that PackageSizeList Array
     * -404 indicates the inputOrder is  lower  than the minimum package size
     */
    
    public function getLowerRange($inputOrder)
    
    { 		
        for($i = $this->maxSize; $i > 0; $i--){
            if($inputOrder > $this->PackageSizesList[$i]){	
				return $i;
            }
        }
        return -404;
    }


    /**Set the HigherRange value as per the Input Request
     *
     * @param $inputOrder
     * @return $i, the index of the packet of that PackageSizeList Array
     * -404 indicates the inputOrder is higher  than the maximum package size
     */
    public function getHigherRange($inputOrder)
    {
		 
        for($i = 0; $i < count($this->PackageSizesList); $i++){
            if($inputOrder < $this->PackageSizesList[$i]){
                return $i;
            }
        }
        return -404;
    }

    /**Process the order Request and setup the Delivery Packages 
     *
     * @return array with occurence of the items 
     */
    public function orderProcess()
    {        
     // check if the $inputRequest is lower than or equal to the smallest range of the PackageSizeList Array, if yes deliver the smallest package
    	 
        if ($this->inputOrder <= $this->PackageSizesList[0]) {
        	 $this->packList[] = $this->PackageSizesList[0];
        	  $outDelivery = $this->packList;
        	   $occurence = array_count_values($outDelivery); // count the occurence of each package
            return view('delivery',compact('occurence')); // pass values to the view
        }
      
     
        // if the $inputRequest is higher than the lowest range then,  using max size index value to set  max range
        while( $this->inputOrder >= $this->PackageSizesList[$this->maxSize]) {	 
        
            $this->inputOrder = $this->inputOrder - $this->PackageSizesList[$this->maxSize];
            $this->packList[] = $this->PackageSizesList[$this->maxSize];
          
              
        }
        
        $higherRange = $this->getHigherRange($this->inputOrder);
        
        $upperDiff = $this->inputOrder - $this->PackageSizesList[$higherRange]; // find the upperDifference to keep the values minimum        
        $lowerDiff = $this->useLower($this->inputOrder);
              
        if(abs($upperDiff) == abs($lowerDiff['diff']) || abs($upperDiff) < abs($lowerDiff['diff'])){
            $this->packList[] = $this->PackageSizesList[$higherRange];
        } else {
            array_push($this->packList, ...$lowerDiff['packList']);
        }
       
        $outDelivery = $this->packList;
        $occurence = array_count_values($outDelivery);     
        return view('delivery',compact('occurence'));
        
    }

    /**Use the lowerRange to minimise widget numbers
     *
     * @param $inputOrder
     * @return array of difference and PackList
     */
    public function useLower($inputOrder)
    {
			  
			   
        $keepLowWidgets =[];
        while( $inputOrder > 0){
            $lowerRange = $this->getLowerRange($inputOrder);
            if($lowerRange < 0){
                $lowerRange = 0;
            }
           $inputOrder = $inputOrder - $this->PackageSizesList[$lowerRange];
          
            $keepLowWidgets[] = $this->PackageSizesList[$lowerRange];
          
        }
        return ['diff' => $inputOrder, 'packList' =>$keepLowWidgets];
    }
}
 

