import $ from 'jquery';

class SeoLandingPosts {
    constructor() {
        this.changeTitleClass();
        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    changeTitleClass() {
        const titles = $( '.seo-landing__title' );
        const dates = $( '.seo-landing__date' );
        const titlesPost = $( '.single-post__title' );
        const datesPost = $( '.single-post__date' );
        const titleSidebar = $( '.seo-posts-sidebar__title' );
        const linkSidebar = $( '.seo-posts-sidebar__link' );

        titles.removeClass( 'h1-alt' ).removeClass( 'h1' );
        dates.removeClass( 'p' ).removeClass( 'h4' );
        titlesPost.removeClass( 'h1-alt' ).removeClass( 'h1' );
        datesPost.removeClass( 'p' ).removeClass( 'h4' );
        titleSidebar.removeClass( 'h4' );
        titleSidebar.removeClass( 'h3' );
        linkSidebar.removeClass( 'p-large' );
        linkSidebar.removeClass( 'h4' );

        if ( 1024 > window.innerWidth ) {
            titles.addClass( 'h1-alt' );
            dates.addClass( 'p' );
            titlesPost.addClass( 'h1-alt' );
            datesPost.addClass( 'p' );
            titleSidebar.addClass( 'h3' );
            linkSidebar.addClass( 'h4' );
        } else {
            titles.addClass( 'h1' );
            dates.addClass( 'h4' );
            titlesPost.addClass( 'h1' );
            datesPost.addClass( 'h4' );
            titleSidebar.addClass( 'h4' );
            linkSidebar.addClass( 'p-large' );
        }
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                this.changeTitleClass();
            },
            500
        );
    }
}

new SeoLandingPosts();
