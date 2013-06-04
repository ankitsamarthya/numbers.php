<?php

namespace NumbersPHP;

/**
 * Numbers.php
 * http://github.com/powder96/numbers.php
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

final class Conversion
{   
    /**
     * Convert the given number in all bases and can be fetch by get function call.
     *
     * @param $num number to convert.
     * @param $frombase base of the number $num
     * @param $tobase (optional) base to convert the number in
     * @param $returntype return value in array or string
     */
    
    private static $binaryResult;
    private static $decimalResult;
    private static $octalResult;
    private static $hexResult;
       
    public static function convert($num, $frombase, $tobase=-1, $returntype=0){
        if($tobase==-1){
            self::$binaryResult = base_convert($num, $frombase, 2);
            self::$decimalResult = base_convert($num, $frombase, 10);
            self::$octalResult = base_convert($num, $frombase, 8);
            self::$hexResult = base_convert($num, $frombase, 16);
            if($returntype==1){
                self::$binaryResult = str_split(self::$binaryResult);
                self::$decimalResult = str_split(self::$decimalResult);
                self::$octalResult = str_split(self::$octalResult);
                self::$hexResult = str_split(self::$hexResult);
            }
        }else{
            if($returntype==0){
                return base_convert($num, $frombase, $tobase);
            }
            else{
                return str_split(base_convert($num, $frombase, $tobase));
            }
        }
        
    }
    public static function getBinary(){
        return self::$binaryResult;
    }
    public static function getDecimal(){
        return self::$decimalResult;
    }
    public static function getOctal(){
        return self::$octalResult;
    }
    public static function getHex(){
        return self::$hexResult;
    }
    
}


?>