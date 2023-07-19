import $ from 'jquery';

class Search {
    // 1. describe and create object
    constructor() {
        this.openButton = $('.js-search-trigger');
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.searchField = $('#search-term');
        this.isOverlayOpen = false;
        this.typingTimer;
        this.events();
    }

    // 2. events
    events() {
        this.openButton.on('click', () => this.openOverlay());
        this.closeButton.on('click', () => this.closeOverlay());
        $(document).on('keydown', (e) => this.keyPressDispatcher(e));
        this.searchField.on('keydown', () => this.typingLogic());
    }

    // 3. methods (function, action...)
    typingLogic() {
        clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout( () => {
            console.log("this is a timeout test.")
        },1000)
    }

    openOverlay() {
        this.searchOverlay.addClass('search-overlay--active');
        $("body").addClass("body-no-scroll");
        this.isOverlayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;

    }

    keyPressDispatcher(e){
        if( e.keyCode == 27 && this.isOverlayOpen){
            this.closeOverlay();
        }else if( e.keyCode == 83 && !this.isOverlayOpen){
            this.openOverlay();
        }
    }
}

export default Search;
