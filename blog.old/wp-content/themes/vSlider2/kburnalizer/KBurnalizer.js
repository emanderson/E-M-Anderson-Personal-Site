/*
	Name: KBurnalizer
	Author: Rui Pereira
	URI: http://iRui.ac/cool-stuff/kburnalizer

	This work is licensed under a Creative Commons License
	http://creativecommons.org/licenses/by/2.5/
*/



/*****
	Class KBurnalizer
	This is the main slideshow class.
	In order for the OO design to work, it is *extremely* important that the kbID parameter 
	matches the "name" of the variable that holds an instance of this objects
	If you don't respect this rule, this doesn't work - simple as that :)	
******/
function KBurnalizer(kbID, viewPortID, displayText /*optional*/, viewPortWidth /*optional*/, viewPortHeight /*optional*/, fadeColor /*optional*/, duration /*optional*/, transition /*optional*/,  fps /*optional*/) {

	// The unique identifier of this object (the variable name)
	this.kbID = kbID;

	// The ID of the "div" that will be replaced by the slide show
	this.viewPortID = viewPortID;
	
	// The specified dimensions of the view port
	// This can be optional
	this.viewPortWidth = 0;
	this.viewPortHeight = 0;
	if(viewPortWidth) {
		this.viewPortWidth = viewPortWidth;
	}
	if(viewPortHeight) {
		this.viewPortHeight = viewPortHeight;
	}

	// Set the backgroung color
	if(!fadeColor) {
		this.fadeColor = '#000';
	}
	else {
		this.fadeColor = fadeColor;
	} 
	
	// Set the framerate
	if(!fps) {
		this.fps = 25;
	}
	else {
		this.fps = fps;
	} 
	
	// Set the duration
	if(!duration) {
		// Default is 5 seg
		this.duration = 5000; 
	}
	else {
		this.duration = duration;
	} 
	
	// Set the transition
	if(!transition) {
		// Default is 2 seg
		this.transition = 2000;
	}
	else {
		this.transition = transition;
	} 
	
	// Set the display text flag
	this.displayText = false;
	if(displayText == true) {
			this.displayText = true;
	}
		
	this.delay = 1000 / this.fps;	

	// Shutdown flag
	this.shutdownFlag = false;

	// Slides	    	
	this.slides = new Array();	
	this.slideIndex;
	this.loadedSlides = 0;
	
	// Active objects
	this.kbViewport; 
	this.kbImage = new Array(2);
	this.kbTextArea;
	this.kbText;
	this.kbLoadBar;
	this.kbiRui;
	
	// Swap support objects	
	this.swap = 0;
	this.activeSlide = new Array(2);
	this.activeFocusArea = new Array(2);;
	
	
	// Register the init of the slideshow on the onload event of the page
	slideShows.push(this);
	
	////////////////////////////////////////////
	// Init function of this object
	this.init = function() {	
		
		// Get the specified viewport				
		this.kbViewport = document.getElementById(this.viewPortID);	
		
		// Set the fade color (black by default)
		this.kbViewport.style.backgroundColor = this.fadeColor;
		
		// Sets the dimensions, if needed
		if( (this.viewPortWidth > 0) && (viewPortHeight > 0) ) {
			this.kbViewport.style.width = this.viewPortWidth + "px";
			this.kbViewport.style.height = this.viewPortHeight + "px";
		}

		// Creates the image objects and places them under the viewport						
		// There are two to support the swapping process
		this.kbImage[0] = document.createElement('img');
		this.kbImage[0].className = 'kb-image';
		this.kbImage[0].style.zIndex = 10;
		this.kbViewport.appendChild(this.kbImage[0]);

		this.kbImage[1] = document.createElement('img');
		this.kbImage[1].className = 'kb-image';
		this.kbImage[1].style.zIndex = -10;
		this.kbViewport.appendChild(this.kbImage[1]);
		
		
		// Text area
		this.kbTextArea = document.createElement('div');
		this.kbTextArea.className = 'kb-text-area';
		this.kbTextArea.style.zIndex = 50;
		if(!this.displayText) {
			this.kbTextArea.style.visibility="hidden";
		}
		this.kbViewport.appendChild(this.kbTextArea);					
		
		
		// Text
		this.kbText = document.createElement('div');
		this.kbText.className = 'kb-text';
		this.kbText.style.zIndex = 60;
		this.kbViewport.appendChild(this.kbText);		
		
		// Load bar
		this.kbLoadBar = document.createElement('div');
		this.kbLoadBar.className = 'kb-load-bar';
		this.kbLoadBar.style.zIndex = 50;
		this.kbViewport.appendChild(this.kbLoadBar);	
		
		// iRui text
		this.kbiRui = document.createElement('div');
		this.kbiRui.className = 'kb-irui-text';
		this.kbiRui.style.zIndex = 100;
		this.kbiRui.innerHTML = "&nbsp;<a href='http://iRui.ac/cool-stuff/kburnalizer' title='Visit the homepage of KBurnalizer at iRui.ac'>KB</a>&nbsp;";
		//this.kbViewport.appendChild(this.kbiRui);			
		
		// Preload all images before starting
		// Execution will only continue when the event handler determines that all
		// images have been loaded
		if(this.slides.length>0) {
			for(var i=0; i<this.slides.length; i++) {
				this.slides[i].load();
			}				
		}
		// In case no images were supplied in the first place
		else {
			this.startSlideShow();
		}
	
	}
	
	// Event handler for a failed image load
	this.onerrorHandler = function() {	
		this.loadStatus = false;
		this.kbObj.commonHandler();
	}
	
	// Event handler for a sucessfull image load
	this.onloadHandler = function() {
		this.loadStatus = true;
		this.kbObj.commonHandler();
	}
	
	
	this.commonHandler = function() {		
		// One more has been loaded
		this.loadedSlides++;
		
		// Display the information
		this.kbText.innerHTML = "Preloading...";
		this.kbLoadBar.style.width = Math.round((this.loadedSlides * 100.0) / this.slides.length) + "%";
		//alert();
				
		// If the last one was loaded
		if(this.loadedSlides == this.slides.length) {
			this.kbText.innerHTML = "";
			this.kbLoadBar.style.display = "none";
			this.startSlideShow();
		}
	}
	
	// Actually starts the slideshow. Only called when all images have been loaded
	this.startSlideShow = function() {
		var i=0;				

		// Check if any images failed during the preload
		while(i<this.slides.length) {
			
			if(this.slides[i].image.loadStatus == false) {
				// This one did, so take it out of the array
				this.slides.splice(i,1);
			}
			else {
				i++;
			}
			
		}		
		
		// If there are any images left, then start the slide show
		if(this.slides.length>0) {
				this.slideIndex = 0;
				this.next();
		}
		else {
			this.kbText.innerHTML = "No Images";
		}
	}

	////////////////////////////////////////////
	// Renders a frame
	this.renderFrame = function(swap, opacity) {
		    		
		// Get viewport size    		
		var viewPortWidth = this.kbViewport.clientWidth;
		var viewPortHeight = this.kbViewport.clientHeight;
		
		// Get image original dimensions
		var originalImageWidth = this.activeSlide[swap].originalImageWidth;
		var originalImageHeight = this.activeSlide[swap].originalImageHeight;
				
		// Dimensions of the selected area    		
		var newWidth =this.activeFocusArea[swap].bottomX - this.activeFocusArea[swap].topX;
		var newHeight = this.activeFocusArea[swap].bottomY - this.activeFocusArea[swap].topY;
		
		// Zoom level
		var zoomX = viewPortWidth * 1.0 / newWidth;
		var zoomY = viewPortHeight * 1.0 / newHeight;

		// Resize image
		this.kbImage[swap].style.width = Math.round((zoomX * originalImageWidth)) + "px";
		this.kbImage[swap].style.height = Math.round((zoomY * originalImageHeight)) + "px";

		// And displace to put selected area on top left    		
		this.kbImage[swap].style.left = -Math.round((this.activeFocusArea[swap].topX * zoomX)) + "px";
		this.kbImage[swap].style.top = -Math.round((this.activeFocusArea[swap].topY * zoomY)) + "px";   


		// Control the opacity. These three settings should cover most browsers
		this.kbImage[swap].style.MozOpacity = opacity;
		this.kbImage[swap].style.filter = 'Alpha(opacity=' + (opacity * 100) + ')';
		this.kbImage[swap].style.opacity = opacity;
		
		
		// Only set the image after all the resizing has been done, to avoid artifacts
		this.kbImage[swap].src = this.activeSlide[swap].image.src;	
		this.kbImage[swap].title = this.activeSlide[swap].description;	
		
		// Make sure the new slide is visible and in front
		this.kbImage[swap].style.visibility = 'visible';
	}


	////////////////////////////////////////////////////////////
	// Calculate the settings for the next frame of the slide
	this.calculateNextFrame = function(
		swap, 
		stepsToGo, inStepsToGo, outStepsToGo, opacity, 
		opacityInc, topXInc, topYInc, bottomXInc, bottomYInc
	) {
		
		// If shutdown is active, stop processing
		if(this.shutdownFlag) {
			return;
		}
		
		// Render the current frame
		this.renderFrame(swap, opacity);
		
		// If there are frames left for this slide
		if(stepsToGo>0) {
			
			// New focus area values
			this.activeFocusArea[swap].topX += topXInc;
			this.activeFocusArea[swap].topY += topYInc;
			this.activeFocusArea[swap].bottomX += bottomXInc;
			this.activeFocusArea[swap].bottomY += bottomYInc;    			
			
			
			// Fade in block
			if(inStepsToGo > 0) {
				opacity += opacityInc;
				
				// Don't let opacity reach 1! 
				// Browsers flicker when changing from "Alpha" mode to standard solid display
				if(opacity >= .99) {
					opacity = .99;
				}
				inStepsToGo--;
			}

			// Fade out block
			if(outStepsToGo < 0) {
				opacity -= opacityInc;				

				if(opacity < 0.01) { 
						opacity = 0.01;
				}
			}

			// The next slide begins when the fade out of the current slide starts
			if(outStepsToGo == 0) {
				
				// Move this image back
				this.kbImage[swap].style.zIndex = -10;
				// Start next slide
				this.next();
			}
			
			// Reduce steps
			outStepsToGo--;										
			stepsToGo--;

			
			// Calculate the next frame after the delay time
			setTimeout(this.kbID + ".calculateNextFrame(" + 
				swap + "," + 
				stepsToGo + "," + 
				inStepsToGo + "," + 
				outStepsToGo + "," + 
				opacity + "," + 
				opacityInc + "," + 
				topXInc + "," + 
				topYInc + "," + 
				bottomXInc + "," + 
				bottomYInc + ")", 
				
				this.delay);    		    		    		
		}
		else {
			// Hide the image when not in use. Speeds up the browser rendering a little bit
			this.kbImage[swap].style.visibility = 'hidden';
			// No more frames to display in this slide. Die away in peace...
		}
	}



	////////////////////////////////////////////////////////////
	// Starts a new slide
	this.startSlide = function(swap, duration, transition, startFocusArea, endFocusArea) {    		    		
		
		
		// Calculate the opposite corners displacements
		var topDisplacementX = endFocusArea.topX - startFocusArea.topX;
		var topDisplacementY = endFocusArea.topY - startFocusArea.topY;
		var bottomDisplacementX = endFocusArea.bottomX - startFocusArea.bottomX;
		var bottomDisplacementY = endFocusArea.bottomY - startFocusArea.bottomY;
		
		// How many frames will be needed at the current framerate
		var durationSteps = Math.round(duration/this.delay);
				
		// How many frames of fade in (half of the transition time)
		var transitionStepsIn = Math.round(((transition / 2) / this.delay));
		// Fade out lasts as long as fade in. transitionStepsOut holds how many frames need to be
		// rendered before the fade out starts
		var transitionStepsOut = durationSteps - transitionStepsIn - 1;
		
		// Opacity increments must correspond to how many frames the fade effect lasts
		var opacityInc = 1 / transitionStepsIn;
		
		// Opposite corners will move in a linear progression between the start and the end point
		var topXInc = topDisplacementX / durationSteps;
		var topYInc = topDisplacementY / durationSteps;
		var bottomXInc = bottomDisplacementX / durationSteps;
		var bottomYInc = bottomDisplacementY / durationSteps;
		
		// Set the working focus area. This will be updated during the rendering process
		this.activeFocusArea[swap] = startFocusArea.getCopy();		
		
		// Show the image description
		this.displayDescription();

		    
		// Start the first frame		
		setTimeout(this.kbID + ".calculateNextFrame(" + 
			swap + "," + 
			durationSteps + "," + 
			transitionStepsIn + "," + 
			transitionStepsOut + ", 0.01 ," + 
			opacityInc + "," + 
			topXInc + "," + 
			topYInc + "," + 
			bottomXInc + "," + 
			bottomYInc + ")", 			
			this.delay);    		    		    		
	}


	////////////////////////////////////////////////////////////
	// Next on the slide show
	this.next = function() {	
		
			// Make an infinite loop	
			if(this.slideIndex == this.slides.length) {
					this.slideIndex=0;
			}
									
			// Activate the next slide
			this.activeSlide[this.swap] = this.slides[this.slideIndex];
			
			this.kbImage[this.swap].style.zIndex = 10;

			
			// Start the slide
			this.startSlide(this.swap, this.duration, this.transition, this.activeSlide[this.swap].getStartFocusArea(this.kbViewport), this.activeSlide[this.swap].getEndFocusArea(this.kbViewport));

			// Prepare for the next one
			this.slideIndex++;					
			this.swap = Math.abs(this.swap-1);
	}


	////////////////////////////////////////////////////////////
	// Start the KBurnalizer slideshow
	this.start = function() {
		this.init();				
	}
	
	////////////////////////////////////////////////////////////
	// Add a new slide to the show
	this.addSlide = function(src,description,width,height,startFocusArea,endFocusArea) {
		var slide = new KBSlide(this,src,description,width,height,startFocusArea, endFocusArea);
		this.slides.push(slide);
	}	
	

	////////////////////////////////////////////////////////////
	// Change the slide duration dinamically	
	// This takes effect on the next slide
	this.setSlideDuration = function(duration) {
		// The duration can't be lower than the transition time
		if(duration>=this.transition) {
			this.duration = duration;
		}
		return this.duration;

	}
	
	
	////////////////////////////////////////////////////////////
	// Change the transition time dinamically	
	// This takes effect on the next slide
	this.setTransitionTime = function(transition) {
		// The transition can't be higher than the slide duration time
		if(transition<=this.duration) {
			this.transition = transition;
		}
		return this.transition;
		
	}


	////////////////////////////////////////////////////////////
	// Change the frame rate
	// This takes effect immediately
	// Be very carefull with this! It might make everything slower if you increase too much
	this.setFPS = function(fps) {
			this.fps = fps;
			this.delay = 1000 / this.fps;	
	}
	
	////////////////////////////////////////////////////////////
	// Prints the text of the slide description
	this.displayDescription = function() {		
		if(this.displayText) {
			this.kbText.innerHTML = this.activeSlide[this.swap].description;
		}
	}
	
	////////////////////////////////////////////////////////////
	// Hides/shows the description area
	// Takes effect immediately
	this.toogleDisplayDescription = function() {		
		this.displayText = !this.displayText;
		if(!this.displayText) {
			this.kbTextArea.style.visibility = "hidden";
			this.kbText.style.visibility = "hidden";
		}
		else {
			this.kbTextArea.style.visibility = "visible";
			this.kbText.style.visibility = "visible";
		}
	}
	
	////////////////////////////////////////////////////////////
	// Set the shutdown flag to true
	// This stops the slideshow immediately
	this.shutdown = function() {
		this.shutdownFlag = true;
	}
}


/******************************************************************************************************
 ******************************************************************************************************/


/*****
	Class KBSlide
	This is a slide in a KBurnalizer slideshow. Every photo has 
	to be wrapped in one of these	
******/
function KBSlide(kbObj,src,description,width,height,startFocusArea, endFocusArea) {

	// The slideshow object that contains this slideshow
	// This is needed for callbacks
	this.kbObj = kbObj;
	
  // Image URL
  this.src = src;

  // Photo description
  this.description = description;

	// Image widht
  this.originalImageWidth = width;
  this.originalImageHeight = height;  
  
  // Focus area to start
  this.startFocusArea = startFocusArea;
  
  // Focus area to finish
  this.endFocusArea = endFocusArea;


  // Image object
  this.image = new Image();
  
  // Images should also know to which slide show they belong, for callbacks
  this.image.kbObj = kbObj;
  this.image.onload = kbObj.onloadHandler;
  this.image.onerror = kbObj.onerrorHandler;
  this.image.loadStatus = false;
   
  
  // This method loads the image for the slide  
  this.load = function() {  	
  	this.image.src = this.src;
  }  
  
  // If the area was not specified, choose a random one
  this.getStartFocusArea = function(kbViewport) {

  	if(!this.startFocusArea) {
			this.randomizeArea(kbViewport);			
		}
		return this.startFocusArea;
  }
  
  // If the area was not specified, choose a random one
  this.getEndFocusArea = function(kbViewport) {
  	if(!this.endFocusArea) {
			this.randomizeArea(kbViewport);
		}
	  return this.endFocusArea;
  }
  
  // Randomizes the start and end focus area
	// To be used when these areas are not provided
  this.randomizeArea = function(kbViewport) {
  	
  	var vpWidth = kbViewport.clientWidth;
  	var vpHeight = kbViewport.clientHeight;
  	var imgWidth = this.originalImageWidth;
  	var imgHeight = this.originalImageHeight;

  	// We will start by calculating the largest possible rectangle that fits the image
		// and is proportional to the viewport
		var largestWidth = vpWidth;
		var largestHeight = vpHeight;
		
		// What factor we need to multiply to make it as wide as the image?
		var scaleFactor = imgWidth * 1.0 / largestWidth;
		
		// First we try to make the rectangle as wide as the image
		largestWidth = scaleFactor * largestWidth; // Which is of course the same as largestWidth = imgWidth, but just to make it clear
		largestHeight = scaleFactor * largestHeight; // Multiply the height by the same amount

		// If the height for any reason is too large, scale everything down
		if(largestHeight > imgHeight) {
		       scaleFactor = imgHeight * 1.0 / largestHeight;
		       largestWidth = scaleFactor * largestWidth;
		       largestHeight = scaleFactor * largestHeight;
		}

		// Ok, now we not everything fits		
		
		// Randomize the start size and end size
		// between 10% and 30% of the rectangle size
		var startRandomScale = 1 - ((Math.random() * 20 + 10) / 100);
		var endRandomScale = 1 - ((Math.random() * 20 + 10) / 100);
		
		var startWidth = Math.floor(largestWidth * startRandomScale);
		var startHeight = Math.floor(largestHeight * startRandomScale);
		
		var endWidth = Math.floor(largestWidth * endRandomScale);
		var endHeight = Math.floor(largestHeight * endRandomScale);
				
		var maximumStartX = imgWidth - startWidth;
		var maximumStartY = imgHeight - startHeight;
		
		var maximumEndX = imgWidth - endWidth;
		var maximumEndY = imgHeight - endHeight;
		
		var startX = Math.floor( Math.random() * maximumStartX);
		var startY = Math.floor( Math.random() * maximumStartY);
		
		var endX = Math.floor( Math.random() * maximumEndX);
		var endY = Math.floor( Math.random() * maximumEndY);

		this.startFocusArea = new FocusArea(startX,startY,startX+startWidth,startY+startHeight);
		this.endFocusArea = new FocusArea(endX,endY,endX+endWidth,endY+endHeight);
	}
}



/******************************************************************************************************
 ******************************************************************************************************/


/*****
	Class FocusArea
	FocusArea is an auxiliary class that represents a rectangular area in a photo		
******/
function FocusArea(topx, topY, bottomX, bottomY) {
		this.topX = topx;
		this.topY = topY;
		this.bottomX = bottomX;
		this.bottomY = bottomY;
		
		this.getCopy = function() {
				return new FocusArea(this.topX, this.topY, this.bottomX, this.bottomY);
		}		
}



/******************************************************************************************************
 ******************************************************************************************************/


// Event Listener
// by Scott Andrew - http://scottandrew.com
// edited by Mark Wubben, <useCapture> is now set to false

function addEvent(obj, evType, fn){
	if(obj.addEventListener){
		obj.addEventListener(evType, fn, false); 
		return true;
	} else if (obj.attachEvent){
		var r = obj.attachEvent('on'+evType, fn);
		return r;
	} else {
		return false;
	}
}	

// Hold all created slideshow objects
var slideShows = new Array();


// Start them all...
function startSlideShows() { 
	for(var i=0; i<slideShows.length; i++) {		
		slideShows[i].start();
	}
} 

// ...on load event
addEvent(window, "load", startSlideShows);


