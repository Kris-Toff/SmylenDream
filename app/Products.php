<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'short_description', 
        'image', 
        'category', 
        'additional_information', 
        'dimensions'
    ];

    public function stringToArray($string)
    {
        //Dimensions parser
        $stringDimension = $string['dimensions'];
        $pairs = explode(',', $stringDimension);
        $dimensions = array();

        for($c = 0 ; $c < count($pairs) ; $c++)
        {
            $rawDimension = explode('-', $pairs[$c]);
            
            if ($rawDimension[0] != '') {
                array_push($dimensions, $rawDimension[0], $rawDimension[1]);
            }
        }
        
        return $dimensions;
    }

    public function arrayToString($array)
    {
        //For Adding dimensions to the database
        //Concatenate all data to a single string
        $dimensions = '';
        $c = 1;

        for($i = 0 ; $i <= 5 ; $i+=2)
        {
            if($array->{'dimension'.$i} != '')
            {
                $dimensions .= $array->{'dimension'.$i};
                $dimensions .= '-' . $array->{'dimensionVal'.$c};

                if($i < 2 || $i < 4){
                    $dimensions .= ',';
                }
            }
            $c += 2;
        }
        
        return $dimensions;
    }

    public function getExtension($filename)
    {
        $extension = explode('.', $filename);

        return $extension[1];
    }
}
