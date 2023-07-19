import $ from 'jquery';

class Search {
    // 1. describe and create object
    constructor() {
        this.openButton = $('.js-search-trigger');
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.events();
    }

    // 2. events
    events() {
        this.openButton.on('click', () => this.openOverlay());
        this.closeButton.on('click', () => this.closeOverlay());
    }

    // 3. methods (function, action...)
    openOverlay() {
        this.searchOverlay.addClass('search-overlay--active');
        $("body").addClass("body-no-scroll");
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $("body").removeClass("body-no-scroll");

    }
}

export default Search;
