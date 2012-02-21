var WP_Dark_Comment = Class.create();
WP_Dark_Comment.prototype = {
	form: null, 
	url: '', 
	initialize: function(url) {
		this.url = url;
		posttwo = $('posttwo');
		if( posttwo === null ) {
			return true;
		}
		form = posttwo.getElementsByTagName('form')[0];
		if( form !== undefined ) {
			this.form = form;
			form.onsubmit = this.handleSubmit.bindAsEventListener(this);
		}
	},
	
	handleSubmit: function(evt) {
		$A(this.form.getElementsByTagName('input')).each( function(el) { if (el.getAttribute('type') == 'submit') { el.setAttribute('value', 'Stand by...'); }});
		new Ajax.Request(
			this.url,
			{
				method: 'post',
				postBody: Form.serialize(this.form) + '&ajax=1',
				onSuccess: this.handleRequest.bindAsEventListener(this),
				onFailure: this.handleError.bindAsEventListener(this)
			}
		);
		return false;
	},
	
	handleRequest: function(response) {
		c = $('posttwo'); cmts = Array();
		$A(c.getElementsByTagName('div')).each( function(div) { if( c == div.parentNode ) { cmts[cmts.length] = div; }});
			
		comment = window.document.createElement('div');
		if((cmts.length - 1) == 0) {
			comment.className = 'commentodd';
			comment.innerHTML = response.responseText;
			c.insertBefore(comment, c.getElementsByTagName('h2')[0].nextSibling);
			$('posttwo').getElementsByTagName('h2')[0].innerHTML = '1 COMMENT';
		} else {
			firstComment = $('posttwo').getElementsByTagName('div')[1];
			newClass = (firstComment.getAttribute('class') == 'commentodd') ? 'commenteven' : 'commentodd';
				
			comment.className = newClass;
			comment.innerHTML = response.responseText;
			c.insertBefore(comment, firstComment);
		
			c.getElementsByTagName('h2')[0].innerHTML = cmts.length + ' COMMENTS';
		}
		np = new fx.Height(comment, {duration: 2000});
		np.hide();
		new fx.Height(this.form.parentNode, {duration: 2000, onComplete: function() {np.toggle();}}).toggle();
	},
	
	handleError: function(response) {
		alert(response.responseText);
		$A(this.form.getElementsByTagName('input')).each( function(el) { if (el.getAttribute('type') == 'submit') { el.setAttribute('value', 'Submit Comment'); }});
	}
}