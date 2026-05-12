<html lang="en">
<head>
  <meta charset="utf-8">    
  <title>
      {$title}
  </title>
  {if $metadescription}
     <meta name="description" content="{$metadescription}">
  {/if}

<!-- Matomo -->


<style>

@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}

/* Toggle Styles */

#viewport {
{if $isAdmin} padding-left:140px;{/if}
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 200px;
  height: 100%;
  padding:4px;
  margin-left: -250px;
  border-right:solid 1px #D3D3D3;
  }

.imaga {
    margin-bottom:10px; height:250px
}
.logo-settings {
    width:100px; 
    margin-top:30px; 
    margin-left:10px
}

.menu-icon {
    display:none;
  }

.box {
  display: block;
  background: #ccc;
}

.box-2 {
  display: block;
  background: #ccc;
}


#trigger:checked + .box {
  display: block;
}


#trigger-2:checked + .box-2 {
  display: block;
}


.h-line {
  width: 35px;
  height: 3px;
  background-color: black;
  margin: 6px 0;
}



#trigger {
  display: none;
}

#trigger-2 {
  display: none;
}

#settings_index_top {
margin-left: 92%;
margin-top: 50px;
margin-bottom: -100px
}

.logo {
    width:500px;
    margin-bottom:10px;
}


.logo-small {
    width:200px;
    display:none;
    margin-bottom:10px;
}

.editor {
    width:45%;
    margin-right:10px;
}
.middle_part_tit {

    margin-top:6px;
}

@media only screen and (max-width: 600px) {

.imaga {
    margin-left:-0px; width:70%; height:auto;
}

.menu-icon {
      display:block;
  }

.m-hide {
      display:none;
  }

#sidebar {
  border-right:none;
  margin-top:0px;
  }
 
 
#viewport {
padding-left:0px;
}

.logo-settings {
    margin-top:0px;
} 

.logo {
    display:none;
    width:70px;
}

.logo-small {
    width:70px;
    display:block;
    margin-bottom:10px;
}

.box {
  display: none;
  background: #ccc;
}

.box-2 {
  display: none;
  background: #ccc;
}

#settings_index_top {
    margin-left:74%;
    margin-top:10px;
    margin-bottom:-100px;
}


}
  </style>
  {if $keywords}
    <meta name="keywords" content="{$keywords}">
  {/if}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script>
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="https://cbdmania.matomo.cloud/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '{$tracker}']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src='//cdn.matomo.cloud/cbdmania.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
      })();
</script>

<!-- End Matomo Code -->

</head>
<body>
<div class="container">