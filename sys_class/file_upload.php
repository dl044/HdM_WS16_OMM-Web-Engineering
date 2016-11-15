<?php

//move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/' . $_FILES['files']['name']);

if(isset($_FILES['files']['tmp_name']))
    {
        // Number of uploaded files
        $num_files = count($_FILES['files']['tmp_name']);

        /** loop through the array of files ***/
        for($i=0; $i < $num_files;$i++)
        {
			move_uploaded_file($_FILES['files']['tmp_name'][$i], 'uploads/' . $_FILES['files']['name'][$i]);
            
        }
    }

?>