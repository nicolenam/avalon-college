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
        this.previousValue;
        this.typingTimer;
        this.events();
    }

    // 2. events
    events() {
        this.openButton.on('click', () => this.openOverlay());
        this.closeButton.on('click', () => this.closeOverlay());
        $(document).on('keydown', (e) => this.keyPressDispatcher(e));
        this.searchField.on('keyup', () => this.typingLogic());
    }

    // 3. methods (function, action...)
    typingLogic() {
        if(this.searchField.val() != this.previousValue){
            clearTimeout(this.typingTimer);

            if(this.searchField.val()) {

                if(!this.isSpinnerVisible){
                    this.resultDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout( () => this.getResults(), 1000);
            }else {

                this.resultDiv.html('');
                this.isSpinnerVisible = false;
            }

           
        }
        this.previousValue = this.searchField.val();
    }

    getResults() {
        $.getJSON(`http://avalon-college.local/wp-json/wp/v2/posts?search=${this.searchField.val()}`, (posts) => {
            this.resultDiv.html(`
                <h2 class="search-overlay__Section-title">General Information</h2>
                <ul class="link-list min-list">
                    ${posts.map((post) => {
                        return `<li><a href="${post.link}">${post.title.rendered}</a></li>`;
                    }).join('')}
                </ul>
            `);
        });
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
        }else if( e.keyCode == 83 && !this.isOverlayOpen && !$('input, textarea').is(':focus')){
            this.openOverlay();
        }
    }
}

export default Search;
