<?php
/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
//function setActive($path) 
//{
    //return Request::path() == $path ? 'active' : '';
//}

function setActive($path)
{
    if ($path == 'admin'){
        return Request::path() == $path ? 'active' :  '';
    }
    else {
        return Request::is($path . '*') ? 'active' :  '';
    }
}

function setActiveapp($path)
{
    return Request::path() == $path ? 'active' :  '';
}

function setActivecount($path)
{
    return Request::path() == $path ? 'active' :  '';
}
    