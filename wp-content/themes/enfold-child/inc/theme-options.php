<?php
add_filter('avf_option_page_init', 'add_option_tab', 10, 1); //Adds option page to Enfold theme option panel
add_filter('avf_option_page_data_init','add_option_to_settings_page', 10, 1); //Adds options to the "Custom Post Types" option page

   function add_option_tab($avia_pages)
    {
        $avia_pages[] = array( 
            'slug' => 'locationsettings', 
            'parent'=>'avia', 
            'icon'=>"hammer_screwdriver.png", 
            'title'=>__('Location Settings','coffy')
        );
        return $avia_pages;
    }

    /*
    * Adds options to the "Custom Post Types" option page
    */
    function add_option_to_settings_page($avia_elements)
    {
        $avia_elements[] =  array(
                    "slug"  => "locationsettings",
                    "name"  => __("Location Archive Page",'coffy'),
                    "desc"  => __("Please select the page (Location Archive) that you would like your location archive page.",'coffy'),
                    "id"    => "location_page",
                    "type"  => "select",
                    "subtype" => 'page'
                );

                
$avia_elements[] =	array(
    "slug"	=> "blog",
    "name" 	=> __("Blog Styling", 'avia_framework' ),
    "desc" 	=> __("Choose the blog styling here.", 'avia_framework' ),
    "id" 	=> "blog_global_style",
    "type" 	=> "select",
    "std" 	=> "",
    "no_first"=>true,
    "subtype" => array( 
                    __( 'Default (Business)', 'avia_framework' ) =>'',
                    __( 'Elegant', 'avia_framework' ) =>'elegant-blog',
                    __( 'Modern Business', 'avia_framework' ) =>'elegant-blog modern-blog',
                    __( 'Modern Ommdd Business', 'avia_framework' ) =>'elegant-blog modern-blog',
                        ));


        return $avia_elements;
    }