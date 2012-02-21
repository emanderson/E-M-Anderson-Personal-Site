/*
Theme Name: vSlider
Theme URI: http://iRui.ac/vSlider
Description: vSlider Theme - created for <a href="http://iRui.ac/">iRui.ac</a>
Version: 1.0
Author: Rui Pereira
Author URI: http://iRui.ac

	vSlider v1.0
	http://iRui.ac

	The CSS, XHTML and design is licensed under a Creative Commons License
	http://creativecommons.org/licenses/by/2.5/
*/	


	// You can change this to get more fluid animation, 
	// but you can get into speed problems
	// Browsers were not really made for fluid animation ;)
	var defaultDelay = 30;
	var steps = 3;

	// These arrays hold temporary references to slider boxes, between timer calls
	var boxContainers = new Array();
	var boxes = new Array();
	


	// Slide, when called from onclick
	function slide(e) {

		// This block handles the different handling of events and targets on IE/W3C
		var targ;
		if (!e) var e = window.event;
		if (e.target) targ = e.target;
		else if (e.srcElement) targ = e.srcElement;
		slideBlock(targ, defaultDelay);
	}
	

	// Main slide function
	function slideBlock(block, delay){

		// Get the caller object (which is the same as the target)
		var callerObj = block;
		var containerID = block.getAttribute('slidebox');				
		
		// Setup objects
		var boxContainer = document.getElementById(containerID);
		var box = document.getElementById(containerID + "_box");			
		boxContainer.callerObj = callerObj;
		
		boxContainers[containerID] = 	boxContainer;
		boxes[containerID] = 	box;
		
		// Define the direction or reverse it
		if(boxContainer.callerObj.direction == undefined) {
			boxContainer.callerObj.direction = true;
		}
		else {
			boxContainer.callerObj.direction = !boxContainer.callerObj.direction;
		} 
		
		// Before sliding down, make sure that the styles are restored to open 
		if(!boxContainer.callerObj.direction) {
			var swapStyles = boxContainer.callerObj.swapstyles;
			for(var i = 0; i<swapStyles.length; i++) {	
				swapStyles[i].element.className = swapStyles[i].open; 

			}
		}
	
		
	
		// Init values		
		box.style.height=box.offsetHeight + "px";		
		if(box.offsetTop < -5000) {				
				box.style.top=-box.offsetHeight + "px";		
				// This is needed for IE - if height is still 0 at this point, 
				// IE will ignore it and display full size		
				boxContainer.style.height="1px";
		}
		else {									
			box.style.top=box.offsetTop + "px";	
			if(!boxContainer.callerObj.direction) {
				// This is needed for IE - if height is still 0 at this point, 
				// IE will ignore it and display full size		
				boxContainer.style.height="1px";
			}			
		}
		boxContainer.style.height=boxContainer.offsetHeight+"px";
	
		// In some rare occasions, the box.offsetHeight may return 0 (when there is not content, for instance)
		// If that occurs, the boxContainer.offsetHeight can be used to calculate the slide speed
		if(box.offsetHeight!=0) {
			boxContainer.slideSpeed = Math.round(box.offsetHeight / steps);
		}
		else {
			boxContainer.slideSpeed = Math.round(boxContainer.offsetHeight / steps);
	  }
		boxContainer.slideDelay = delay;	

		
		// If the timer is active, clear it immediately
		if(boxContainer.slideInterval != undefined ) {
			clearInterval(boxContainer.slideInterval);
		}		
	
		// Slide on the correct direction
		if(boxContainer.callerObj.direction) {				
			boxContainer.slideInterval = setInterval("slideUp('" + containerID + "')",boxContainer.slideDelay)				
		}
		else {						
			boxContainer.slideInterval = setInterval("slideDown('" + containerID + "')",boxContainer.slideDelay)	
		}
		
	}
	
	function slideUp(containerID){
		// Get the objects
		var boxContainer = boxContainers[containerID];
		var box = boxes[containerID];
		
			
		// Get current values
		var boxHeight = parseInt(box.style.height);
		var boxTop = parseInt(box.style.top);
		var boxContainerHeight = parseInt(boxContainer.style.height);
		var slideSpeed = boxContainer.slideSpeed;

		
		
				
		// While the box is still visible, move it up and resize the inner box 
		if ( boxTop >= (boxHeight*(-1)) ) {
			box.style.top = boxTop - slideSpeed + "px"
			if((boxContainerHeight - slideSpeed) > 0) {
				boxContainer.style.height = boxContainerHeight - slideSpeed + "px"
			}

		}
		// When finished, stop the timer and position absolute correct values
		else{
			clearInterval(boxContainer.slideInterval)
			box.style.top = boxHeight*(-1) + "px";
			
			// Change all styles to closed
			var swapStyles = boxContainer.callerObj.swapstyles;
			for(var i = 0; i<swapStyles.length; i++) {
				swapStyles[i].element.className = swapStyles[i].closed; 
			}		
			
		}		
	}
	
	function slideDown(containerID){
		
		// Get the objects		
		var boxContainer = boxContainers[containerID];
		var box = boxes[containerID];	
	
		// Get current values
		var boxHeight = parseInt(box.style.height);
		var boxTop = parseInt(box.style.top);
		var boxContainerHeight = parseInt(boxContainer.style.height);
		var slideSpeed = boxContainer.slideSpeed;						
				
		// While the box is not fully visible, move it down and resize the inner box 
		if ( (boxTop + slideSpeed) < 0 ) {			
			box.style.top = boxTop + slideSpeed + "px"
			boxContainer.style.height = boxContainerHeight + slideSpeed + "px"
		}
		// When finished, stop the timer and position absolute correct values
		else{
			clearInterval(boxContainer.slideInterval)
			box.style.top = 0;
			// This restores the full size. 100% is important! Otherwise the size becomes static after a slide down.
			box.style.height="100%";
			boxContainer.style.height="100%";
			
			
		}		
	}
	
	
	// Init all the vSliders in the page
	function initvSliders() {
		
		// Get all DIVs
		var allDIVs = document.getElementsByTagName('div');
		
		for(var i = 0; i < allDIVs.length; i++) {
			
			// If they are vSliders
			if(allDIVs[i].getAttribute("vslider")) {
														
				// Add the onClick event
				addEvent(allDIVs[i], "click", slide);			
				
				// Eval the StyleSwitch code section, if present
				if(allDIVs[i].getAttribute("styleswitchcode")) {	
						var swapstyles = eval(allDIVs[i].getAttribute("styleswitchcode"));
				}
				else {
						var swapstyles = new Array();
				} 
				
				allDIVs[i].swapstyles = swapstyles;
				
				
				if(allDIVs[i].getAttribute("startclosed")) {				
					//slideBlock(allDIVs[i],1);
					allDIVs[i].direction = true;
				}
			}
		}
	}
	
	
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

// Register the init of Sliders on the onload event of the page
addEvent(window, "load", initvSliders);




