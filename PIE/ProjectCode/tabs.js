/*Tabs code for about page. Can use for other pages if needed.*/
    var tabLinks = new Array();
    var contentDivs = new Array();

    

    function init(){
        //Grab the tab links and content divx from the page
        var tabListItems = document.getElementById('tabs').childNodes;
        for (var i = 0; i < tabListItems.length; i++){
            if (tabListItems[i].nodeName == "LI"){
                var tabLink = getFirstChildWithTagName(tabListItems[i], 'A');
                var id = getHash(tabLink.getAttribute('href'));
                tabLinks[id] = tabLink;
                contentDivs[id] = document.getElementById(id);
            }//if
        }//for

        //Assign onclick to tab links and highlight first tab
        var i = 0;

        for (var id in tabLinks){
            tabLinks[id].onclick = showTab;
            tabLinks[id].onfocus = function() { this.blur() };
            if (i == 0) tabLinks[id].className = 'selected';
            i++;
        }//for

        //Hide all content divisions except the first
        var i = 0;

        for (var id in contentDivs){
            if (i != 0) contentDivs[id].className = 'tabContent hide';
            i++;
        }//for
    }//init()


    function showTab() {
        var selectedId = getHash( this.getAttribute('href') );

        // Highlight the selected tab, and dim all others.
        // Also show the selected content div, and hide all others.
        for ( var id in contentDivs ) {
            if ( id == selectedId ) {
                tabLinks[id].className = 'selected';
                contentDivs[id].className = 'tabContent';
            } else {
                tabLinks[id].className = '';
                contentDivs[id].className = 'tabContent hide';
            }
        }

        // Stop the browser following the link
        return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
        for ( var i = 0; i < element.childNodes.length; i++ ) {
            if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
        }
    }

    function getHash( url ) {
        var hashPos = url.lastIndexOf ( '#' );
        return url.substring( hashPos + 1 );
    }


