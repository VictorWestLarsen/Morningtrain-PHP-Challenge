<?php
	class Template
	{
		var $assignedValues = array(); // New array for the values that should be replaced
		var $tpl; // This is what is going into the html. 
		function __construct($_path = '')
		{
			if (!empty($_path)) //Make sure that the path is not empty
			{
				if (file_exists($_path)) //if the file exist then
				{
					$this->tpl = file_get_contents($_path); //put the content of that file into the tpl varible
				}
				else
				{
					echo "<b>Template Error:</b> File Inclusion Error"; // if the file does not exist the throw this error
				}
			}

		}

		function assignValue($_searchString, $_replaceString){	//Getting the key and value 
			if (!empty($_searchString)) 					// if searchstring is not empty then
			{
				$this->assignedValues[strtoupper($_searchString)] = $_replaceString;	//Add searchstring as key with all letters capitalized, and assign the _replacestring as value.
			}
		}

		function show()
		{
			if (count($this->assignedValues) > 0 ) // check if the assignedvalues is populated as the assignedValues array is empty when it is created.
			{
				foreach ($this->assignedValues as $key => $value) //Assign the assignValues variable as a key, value pair.
				{
					$this->tpl = str_replace('{'.$key.'}', $value, $this->tpl); // Replace everything in the delimiter with that is equal to the $key variable and replace it with
				}																// the value variable, in the subject which is the tpl variable.
			}																	

			echo $this->tpl;	//display the altered html with the placeholders filled.
		}
	}