/* eslint-disable */
import {init as faqInit} from "../components/faq";
// import {ScrollSpy, Collapse} from "bootstrap";

export default {
  init() {
    // JavaScript to be fired on all pages
    /**
     * Modernizr custom tests
     */
    Modernizr.addTest('IE', function() {
      return window.navigator.userAgent.indexOf('MSIE ') > -1 || window.navigator.userAgent.indexOf('Trident/') > -1;
    });
    Modernizr.addTest('has-scroll', function() {
      return window.innerHeight < document.body.scrollHeight;
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    faqInit();
  
    const mobileMenu = document.getElementById( 'navPrimaryMenu' );
    const eyebrow = document.querySelector( '.eyebrow-section' );
    const header = document.getElementById( 'site-navbar' );
    
    window.addEventListener( 'shown.bs.collapse', function() {
      if ( window.innerWidth < 1200 ) {
        let topHeight = eyebrow.offsetHeight + header.offsetHeight;
        mobileMenu.style.height = ( window.innerHeight - topHeight ) + 'px';
        document.querySelector( 'body' ).classList.add( 'menu-show' );
      }
    } );
  
    window.addEventListener( 'hidden.bs.collapse', function() {
      document.querySelector( 'body' ).classList.remove( 'menu-show' );
    } );
  },
};
