import $ from 'jquery';

class Search {
    // 1. describe and create object
    constructor() {
        this.openButton = $('.js-search-trigger');
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.searchField = $('#search-term');
        this.resultDiv = $('#search-overlay__results');
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
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
        if(!this.isSpinnerVisible){
            this.resultDiv.html('<div class="spinner-loader"></div>');
            this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout( () => this.getResults(), 1000)
    }

    getResults() {
        this.resultDiv.html(`<h2>yoyoyo</h2>`);
        this.isSpinnerVisible = false;
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
