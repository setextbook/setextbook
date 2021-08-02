<?php

$code_cat_survey = 'survey';
$name_cat_survey = 'Surveys';
$code_cat_opensource = 'opensource';
$name_cat_opensource = 'Open Source Projects';
$code_cat_website = 'website';
$name_cat_website = 'Websites';
$code_cat_m = 'm';
$name_cat_m = 'Motivations';
$code_cat_ips = 'ips';
$name_cat_ips = 'Information Processing Style';
$code_cat_cse = 'cse';
$name_cat_cse = 'Computer Self-Efficacy';
$code_cat_atr = 'atr';
$name_cat_atr = 'Attitude Toward Risk';
$code_cat_ls = 'ls';
$name_cat_ls = 'Learning Style';
$short_title_filename = 'short_title.txt';
$cats_filename = 'cats.txt';
$problem_filename = 'problem.txt';
$solution_filename = 'solution.txt';
$facets_filename = 'facets.txt';
$evidence_filename = 'evidence.txt';
$before_img_filename = 'zoom_before';
$after_img_filename = 'zoom_after';
$img_file_extensions = array('png','PNG','gif','GIF','jpg','JPG','jpeg','JPEG'); // allowed image file extensions
$facets = array($code_cat_m,$code_cat_ls,$code_cat_atr,$code_cat_cse,$code_cat_ips);

// Return whether or not the design is in the given category
// Input: Path to the design, name of category
// Output: Boolean
function hasCat($dir, $cat) {
  global $cats_filename;
  $out = false;
  $cats = '';
  $cats_path = "{$dir}/{$cats_filename}";
  if(file_exists($cats_path)) { $cats = file($cats_path, FILE_IGNORE_NEW_LINES); }
  if(in_array($cat, $cats)) { $out = true; }
  return $out;
}

function hasFacet($dir, $facet) {
  $out = false;
  $facets = getFacets($dir);
  if(in_array($facet, $facets)) { $out = true; }
  return $out;
}

function hasImg($dir, $img_filename) {
  global $img_file_extensions;
  $out = false;
  foreach($img_file_extensions as $i) {
    $img_path = "{$dir}/{$img_filename}.{$i}";
    if(file_exists($img_path)) { $out = true; break; }
  }
  return $out;
}

function hasShortTitle($dir) {
  global $short_title_filename;
  $out = false;
  $short_title_path = "{$dir}/{$short_title_filename}";
  if(file_exists($short_title_path)) { $out = true; }
  return $out;
}

function getProblem($dir) {
  global $problem_filename;
  $problem = '';
  $problem_path = $dir.'/'.$problem_filename;
  if(file_exists($problem_path)) { $problem = file_get_contents($problem_path); }
  return $problem;
}

function getSolution($dir) {
  global $solution_filename;
  $solution = '';
  $solution_path = $dir.'/'.$solution_filename;
  if(file_exists($solution_path)) { $solution = file_get_contents($solution_path); }
  return $solution;
}

function getFacets($dir) {
  global $facets_filename;
  $facets = '';
  $facets_path = $dir.'/'.$facets_filename;
  if(file_exists($facets_path)) { $facets = file($facets_path, FILE_IGNORE_NEW_LINES); }
  return $facets;
}

function getEvidence($dir) {
  global $evidence_filename;
  $evidence = '';
  $evidence_path = $dir.'/'.$evidence_filename;
  if(file_exists($evidence_path)) { $evidence = file_get_contents($evidence_path); }
  return $evidence;
}

function getShortTitle($dir) {
  global $short_title_filename;
  $short_title = '';
  $short_title_path = "{$dir}/{$short_title_filename}";
  if(hasShortTitle($dir)) { $short_title = file_get_contents($short_title_path); }
  return $short_title;
}

function dirNoSpaces($dir) {
  return str_replace(' ', '', $dir);
}

// Return names of all directories in a given category
function getDirs($cat=NULL) {
  global $facets;
  $newDirs = array();
  $dirs = array_filter(glob('*'), 'is_dir');
  if($cat!=NULL) {
    if(in_array($cat,$facets)) {
      $newDirs = getFacetDirs($cat);
    } else {
      foreach($dirs as $dir) {
        if(hasCat($dir, $cat)) {
          array_push($newDirs,$dir);
        }
      }
    }
  } else { $newDirs = $dirs; }
  return $newDirs;
}

function getFacetDirs($facet) {
  $newDirs = array();
  $dirs = array_filter(glob('*'), 'is_dir');
  if($facet!=NULL) {
    foreach($dirs as $dir) {
      if(hasFacet($dir, $facet)) {
        array_push($newDirs,$dir);
      }
    }
  } else { $newDirs = $dirs; }
  return $newDirs; 
}

?>