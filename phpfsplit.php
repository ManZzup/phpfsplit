<?php
/**
 * A file splitter function for php
 * Can split a file to number of parts depending on the buffer size given
 * 
 * @author manujith pallewatte [manujith.nc@gmail.com]
 * @date   30/10/13
 *  * 
 * @param  $file String
 * Path of the file to split
 * @param $buffer number
 * The [maximum] size of the part of a file
 * @return array S
 * et of strings containing the paths to the parts
 */
function fsplit($file,$buffer=1024){
    //open file to read
    $file_handle = fopen($file,'r');
    //get file size
    $file_size = filesize($file);
    //no of parts to split
    $parts = $file_size / $buffer;
    
    //store all the file names
    $file_parts = array();
    
    //path to write the final files
    $store_path = "splits/";
    
    //name of input file
    $file_name = basename($file);
    
    for($i=0;$i<$parts;$i++){
        //read buffer sized amount from file
        $file_part = fread($file_handle, $buffer);
        //the filename of the part
        $file_part_path = $store_path.$file_name.".part$i";
        //open the new file [create it] to write
        $file_new = fopen($file_part_path,'w+');
        //write the part of file
        fwrite($file_new, $file_part);
        //add the name of the file to part list [optional]
        array_push($file_parts, $file_part_path);
        //close the part file handle
        fclose($file_new);
    }    
    //close the main file handle
    
    fclose($file_handle);
    return $file_parts;
}

?>
