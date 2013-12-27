<?php 
global $plugins,$status ,$page ,$usersearch ,$post ,$submenu, $action,$wp_post_types,$hook_suffix,$_wp_submenu_nopriv,$menu,$allowedentitynames,$wp, $wp_query, $wp_the_query,$wpdb,$wp_rewrite;

if($params['action'] == 'wp-login.php')
{
	$_SERVER['PHP_SELF'] = '/wp-login.php';
    require APPLICATION_PATH.'/../library/wordpress/wp-login.php';
}elseif($params['action'] == 'wp-admin')
{
    if(isset($params['filename']))
    {
        if(preg_match("/^[a-z0-9-_]+$/i", $params['filename']))
        {
            if(isset($params['foldername']) && preg_match("/^[a-z0-9-_\/]+$/i", $params['foldername']))
            {
            	$_SERVER['PHP_SELF'] = "/wp-admin/".$params['foldername'].$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['foldername'].$params['filename'].'.php';
            }else{
            	$_SERVER['PHP_SELF'] = "/wp-admin/".$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php';
            }
        }else{
        	$_SERVER['PHP_SELF'] = "/wp-admin/index.php";
            require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
        }
    }else{
    	$_SERVER['PHP_SELF'] = "/wp-admin/index.php";
        require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
    }
}else{
    if(isset($params['filename']))
    {
        if(preg_match("/^[a-z0-9-_]+$/i", $params['filename']))
        {
            if(isset($params['foldername']) && preg_match("/^[a-z0-9-_\/]+$/i", $params['foldername']))
            {
            	$_SERVER['PHP_SELF'] = '/wp-admin/'.$params['foldername'].$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['foldername'].$params['filename'].'.php';
            }else{
                if(is_file(APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php'))
                {
                	$_SERVER['PHP_SELF'] = '/wp-admin/'.$params['filename'].'.php';
                    require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php';
                }
                elseif(is_file(APPLICATION_PATH.'/../library/wordpress/'.$params['filename'].'.php'))
                {
                	$_SERVER['PHP_SELF'] = $params['filename'].'.php';
                    require APPLICATION_PATH.'/../library/wordpress/'.$params['filename'].'.php';
                }
            }
        }else{
        	$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
            require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
        }
    }else{
    	$_SERVER['PHP_SELF'] = '/index.php';
        require APPLICATION_PATH.'/../library/wordpress/index.php';
    }
}