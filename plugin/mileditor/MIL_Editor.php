<?php
/*
Plugin Name: MIL Editor
Plugin URI: http://
Description: Media Industry Link 페이지 작성을 위한 플러그인입니다.
Version: 1.0
Author: voQov
Author URI: http://voqov.dothome.co.kr
License: GPL2

Copyright 2014 Super Rocket (email : ithemeso@gmail.com )
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

define('MILEDITOR_ABSPATH', plugin_dir_path(__FILE__));             // 플러그인 절대경로
define('MILEDITOR_PLUGINS_URL', plugins_url('', __FILE__));         // 플러그인 상대경로
define('MILEDITOR_ROOT', __FILE__);
//echo "<script>console.log( '" . MILEDITOR_ABSPATH . "' );</script>";
//echo "<script>console.log( '" . MILEDITOR_PLUGINS_URL . "' );</script>";
//echo "<script>console.log( '" . MILEDITOR_ROOT . "' );</script>";

require_once 'backend/functions.php';                                  // Core Funtions
require_once 'backend/class.config.php';
require_once 'backend/class.mileditor.php';                       // 클래스.게시판 생성관련 전반                     
require_once 'backend/class.initialize.php';                          // 클래스.활성화 세팅
require_once 'backend/page.curriculum.php';                           // 관리자 메뉴 - 교과과목편집 페이지
require_once 'frontend/page.subject.php';                              // 관리자 메뉴 - 과목편집 페이지
require_once 'backend/shortcode.curriculum.php';
require_once 'frontend/view.curriculum.php';
require_once 'frontend/view.subject.info.php';

?>
