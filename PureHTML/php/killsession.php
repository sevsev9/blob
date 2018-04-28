<?php
/**
 * Created by PhpStorm.
 * User: maise
 * Date: 28.04.2018
 * Time: 15:47
 */
session_destroy();
echo "<script type='text/javascript'>                    
                    function sleep (time) {
                      return new Promise((resolve) => setTimeout(resolve, time));
                    }
                    
                    sleep(0).then(() => {
                        window.location.replace(\"../index.php\");
                    });                            
       </script>";