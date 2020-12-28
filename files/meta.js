(function() {
	var Realmac = Realmac || {};

	Realmac.meta = {
		
		// Set the browser title
		//
		// @var String text
		setTitle: function(text) {
			return document.title = text;
		},
		
		// Set the content attribute of a meta tag
		//
		// @var String name
		// @var String content
		setTagContent: function(tag, content){
			// If the tag being set is title
			// return the result of setTitle
			if ( tag === 'title' )
			{
				return this.setTitle(content);
			}
			
			// Otherwise try and find the meta tag
			var tag = this.getTag(tag);
			
			// If we have a tag, set the content
			if ( tag !== false )
			{
				return tag.setAttribute('content', content);
			}
			
			return false;
		},
		
		// Find a meta tag
		//
		// @var String name
		getTag: function(name) {
			var meta = document.querySelectorAll('meta');
			
			for ( var i=0; i<meta.length; i++ )
			{
				if (meta[i].name == name){
					return meta[i];
				}
			}
			
			var tag = document.createElement('meta');
			tag.name = name;
			document.getElementsByTagName('head')[0].appendChild(tag);
			
			return tag;
		}
	};
 
	// Object containing all website meta info
	var websiteMeta = {"archive-december-2020.html":"Archives for December 2020","category-amg.html":"A list of posts in category &ldquo;AMG&rdquo;","category-photoshoot.html":"A list of posts in category &ldquo;Photoshoot&rdquo;","category-sport-bikes.html":"A list of posts in category &ldquo;Sport Bikes&rdquo;","category-motorcycles.html":"A list of posts in category &ldquo;Motorcycles&rdquo;","tag-amg.html":"Posts tagged &ldquo;AMG&rdquo;","tag-mercedes.html":"Posts tagged &ldquo;Mercedes&rdquo;","category-sports-cars.html":"A list of posts in category &ldquo;Sports Cars&rdquo;","category-personal.html":"A list of posts in category &ldquo;Personal&rdquo;","category-liter-bikes.html":"A list of posts in category &ldquo;Liter Bikes&rdquo;","category-humor.html":"A list of posts in category &ldquo;Humor&rdquo;","83407d93ddce01157bff2b3eba6efba8-0.html":"￼\n\nGot the opportunity today to shoot an absolutely beautiful looking Mercedes SL65 AMG. Thing was stunning both inside and out. Personally, I'm not m","category-ninja.html":"A list of posts in category &ldquo;Ninja&rdquo;","category-apple.html":"A list of posts in category &ldquo;Apple&rdquo;","tag-coupe.html":"Posts tagged &ldquo;Coupe&rdquo;","category-work.html":"A list of posts in category &ldquo;Work&rdquo;","category-kawasaki.html":"A list of posts in category &ldquo;Kawasaki&rdquo;","category-mercedes.html":"A list of posts in category &ldquo;Mercedes&rdquo;","tag-sports-cars.html":"Posts tagged &ldquo;Sports Cars&rdquo;","category-1400cc.html":"A list of posts in category &ldquo;1400CC&rdquo;","category-cars.html":"A list of posts in category &ldquo;Cars&rdquo;","tag-cars.html":"Posts tagged &ldquo;Cars&rdquo;","tag-sl65.html":"Posts tagged &ldquo;SL65&rdquo;"};
 
	// pageId must match the key in websiteMeta object
	var url = window.location.pathname;
	var pageId = url.substring(url.lastIndexOf('/')+1);
	if (!pageId || pageId.length == 0){
		pageId = 'index.html';
	}
	pageMeta = websiteMeta[pageId];
 
	// If we have meta for this page
	if (pageMeta){
		Realmac.meta.setTagContent('description', pageMeta);
	}
 
 })();