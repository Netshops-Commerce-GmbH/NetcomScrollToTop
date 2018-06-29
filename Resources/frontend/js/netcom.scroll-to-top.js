;(function ($) {
    'use strict';

    /**
     * Netcom Scroll to top Plugin
     */
    $.plugin('netcomScrollToTop', {
        /**
         * Default options for the plugin.
         *
         * @public
         * @property defaults
         * @type {Object}
         */
        defaults: {
            /**
             * Hidden class name
             *
             * @type {String}
             */
            hiddenClass: 'is--hidden',

            /**
             * Animation speed
             *
             * @type {String}
             */
            animationSpeed: '400'
        },

        /**
         * initialized the plugin
         *
         * @public
         * @method init
         */
        init: function () {
            var me = this,
                opts = me.opts;

            me.registerEvents();
            me.applyDataAttributes();
            me.toggleBtn();
        },

        /**
         * registers all events
         *
         * @public
         * @method registerEvents
         */
        registerEvents: function() {
            var me = this;

            me._on(me.$el, 'click', function (e) {
                me.onClickBtn(e);
            });

            me._on(window, 'resize', function () {
                me.toggleBtn();
            });

            me._on($(document), 'scroll', function () {
                me.toggleBtn();
            });
        },

        /**
         * Scrolls to Top smoothly
         * Publishes Event
         *
         * @public
         * @method onClickBtn
         * @param e
         */
        onClickBtn: function(e) {
            var me = this;

            e.preventDefault();
            $('html, body').stop().animate({scrollTop: 0}, me.opts.animationSpeed);

            $.publish('plugin/netcomScrollToTop/onClickBtn', [ me ]);
        },

        /**
         * Hides button, if body is not higher than viewport, or not scrolled
         *
         * @public
         * @method toggleBtn
         */
        toggleBtn: function() {
            var me = this;

            if ($('body').height() < window.innerHeight) {
                me.$el.toggleClass(me.opts.hiddenClass, true);
                return false;
            }

            me.$el.toggleClass(me.opts.hiddenClass, (window.pageYOffset <= 164));
        },

        /**
         * Destroys the initialized plugin completely, so all event listeners will
         * be removed and the plugin data, which is stored in-memory referenced to
         * the DOM node.
         *
         * @public
         * @method destroy
         */
        destroy: function () {
            var me = this;

            me._destroy();
        }
    });
})(jQuery);

window.StateManager.addPlugin('.scroll-to-top-link', 'netcomScrollToTop');
