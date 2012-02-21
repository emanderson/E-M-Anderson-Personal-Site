var WP_Dark_Search = Class.create();
WP_Dark_Search.prototype = {
	form: null,
	target: null,
	url: '',
	searchfield: null,
	
	initialize: function(url) {
		this.url = url;
		this.form = $('column2').getElementsByTagName('form')[0];
		this.form.onsubmit = this.handleSubmit.bindAsEventListener(this);
		this.target = $('column2').getElementsByTagName('div')[1];
		this.searchfield = this.form.getElementsByTagName('input')[0];
		this.searchfield.onfocus = this.focusField.bindAsEventListener(this);
		this.searchfield.onblur = this.blurField.bindAsEventListener(this);
	},
	
	handleSubmit: function() {
		val = $F(this.form.getElementsByTagName('input')[0]);
		if( val ) {
			url = this.url + '/?s=' + encodeURIComponent(val) + '&ajax=1';
			new Ajax.Request(
			  url, 
			  {
			  	method:'get',
			  	onSuccess: this.handleResponse.bindAsEventListener(this)
			  }
			);
		}
		return false;
	},
	
	handleResponse: function(response) {
		div = window.document.createElement('div');
		div.innerHTML = response.responseText;
		this.target.parentNode.insertBefore(div, this.target);
		ef = new fx.Height(div, {duration:1000});
		ef.hide();
		
		tgt = this.target;
		new fx.Height(this.target, {duration:1000, onComplete: function() { ef.toggle(); tgt.parentNode.removeChild(tgt);}}).toggle();
		this.target = div;
	},
	
	focusField: function(evt) {
		this.searchfield.value = '';
	},
	
	blurField: function(evt) {
		if( this.searchfield.value == '' ) {
			this.searchfield.value = 'Search';
		}
	}
}