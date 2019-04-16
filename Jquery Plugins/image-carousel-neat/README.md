# Neat Slider v1.0.0
## A fluid jQuery image slider, made simple.

### License
Released under the MIT license - http://opensource.org/licenses/MIT

Let's make it Neater!

## Installation

### Step 1: Link required files

First download the files, everything you need is located in the neat-slider folder. Copy the neat-slider folder into the same directory as your HTML files, then include the files in your document by copying the following HTML to the head of your document.

```html
<!-- Linearicons used for next and previous controler icons -->
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<!-- Neat Slider stylesheet -->
<link rel="stylesheet" type="text/css" href="neat-slider/neat-slider.css">
<!-- Neat Slider Javascript file  -->
<script src="neat-slider/neat-slider.js"></script>
```
(If you wish to use your own icons for the next and previous controls, you can remove the Linearicons stylesheet)

Next we you need to include the jQuery library for the slider to work. Choose either the jQuery library served from Google CDN or jQuery library supplied with Neat Slider from the HTML bellow, and paste it into the head of your document.

```html
<!-- jQuery library served grom Google CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery library supplied with Neat Slider -->
<script src="neat-slider/jquery.min.js"></script>
```

### Step 2: Create HTML markup

Lastly before you get rolling copy the HTML into the bodyu of the document, and replace the names of the images with your own. You add and remove as many images as you wish.

```html
<div class="neat-slider">
  <!-- Previous image arrow -->
  <span class="[ lnr lnr-chevron-left-circle ] arrow" id="prev" alt="Previous"></span>

  <!-- Image container -->
  <div class="ns-image-container">
    <img src="images/image_1.jpg">
    <img src="images/image_2.jpg">
    <img src="images/image_3.jpg">
    <img src="images/image_4.jpg">
    <img src="images/image_5.jpg">
    <img src="images/image_6.jpg">
  </div>

  <!-- Next image arrow -->
  <span class="[ lnr lnr-chevron-right-circle ] arrow" id="next" alt="Next"></span>

  <!-- Dot navigation -->
  <div class="dotnav"></div>
</div>
```

That's it! You have successfully installed Neat Slider to your project.
If you wish to change the syling you can do so in the neat-slider.css of overide styles from your own stylesheet.
And if you want a demo all you need to do is open the index.html from the dist folder in your browser.
