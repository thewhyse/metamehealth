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
  
    // const navLinks = document.querySelectorAll( '.nav-link' );
    // const menuToggle = document.getElementById( 'navPrimaryMenu' );
    // const bsCollapse = new Collapse( menuToggle );
    // navLinks.forEach( ( l ) => {
    //   l.addEventListener( 'click', () => { bsCollapse.toggle() } )
    // } );
    
  
    // if ( window.innerWidth >= 992 ) {
    //   const scrollSpy = new ScrollSpy( document.body, {
    //     target: '#menu-main-menu',
    //     offset: 200,
    //   } );
    //
    //   //let menuScrollSpy = document.querySelector('[data-bs-spy="scroll"]');
    //   window.addEventListener( 'activate.bs.scrollspy', function ( e ) {
    //     console.log( e );
    //   } )
    //   document.getElementById( 'menu-main-menu' ).addEventListener( 'activate.bs.scrollspy', function ( e ) {
    //     console.log( e );
    //   } )
    // }
  },
};
