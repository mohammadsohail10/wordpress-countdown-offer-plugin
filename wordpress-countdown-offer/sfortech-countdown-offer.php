<?php
/**
 * Plugin Name: SFORTECH Countdown Offer
 * Plugin URI:  https://sfortech.com
 * Description: Dynamic countdown timer shortcode with headline and sub-headline.
 * Version:     1.0.0
 * Author:      Sohail
 * License:     GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Ensure jQuery is loaded
 */
function sfortech_countdown_enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'sfortech_countdown_enqueue_jquery');


/**
 * Shortcode: [sfortech_countdown headline="" sub_headline="" expire_date="" expire_time=""]
 */
function sfortech_offer_countdown_shortcode($atts) {

    $atts = shortcode_atts(array(
        'headline'      => 'Limited Time Offer!',
        'sub_headline'  => 'This exclusive offer ends soon.',
        'expire_date'   => '',
        'expire_time'   => '23:59:59',
    ), $atts, 'sfortech_countdown');

    if ( empty($atts['expire_date']) ) {
        return '<strong>Countdown Error:</strong> expire_date is required.';
    }

    $expiry = esc_attr($atts['expire_date'] . ' ' . $atts['expire_time']);
    $uid = 'sfortech-countdown-' . uniqid();

    ob_start(); ?>
    
    <div class="sfortech-offer-wrapper" id="<?php echo esc_attr($uid); ?>" data-expiry="<?php echo $expiry; ?>">
        <h2 class="sfortech-headline"><?php echo esc_html($atts['headline']); ?></h2>
        <p class="sfortech-subheadline"><?php echo esc_html($atts['sub_headline']); ?></p>

        <div class="sfortech-timer">
            <div><span class="days">00</span><small>DAYS</small></div>
            <div><span class="hours">00</span><small>HRS</small></div>
            <div><span class="minutes">00</span><small>MINS</small></div>
            <div><span class="seconds">00</span><small>SECS</small></div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('sfortech_countdown', 'sfortech_offer_countdown_shortcode');


/**
 * Inline jQuery Countdown Script
 */
function sfortech_countdown_inline_script() {
    ?>
    <script>
    jQuery(document).ready(function ($) {

        $('.sfortech-offer-wrapper').each(function () {

            var wrapper = $(this);
            var expiryDate = new Date(wrapper.data('expiry')).getTime();

            function updateCountdown() {
                var now = new Date().getTime();
                var distance = expiryDate - now;

                if (distance <= 0) {
                    wrapper.find('.days, .hours, .minutes, .seconds').text('00');
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                wrapper.find('.days').text(String(days).padStart(2, '0'));
                wrapper.find('.hours').text(String(hours).padStart(2, '0'));
                wrapper.find('.minutes').text(String(minutes).padStart(2, '0'));
                wrapper.find('.seconds').text(String(seconds).padStart(2, '0'));
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });

    });
    </script>
    <?php
}
add_action('wp_footer', 'sfortech_countdown_inline_script');


/**
 * Inline CSS
 */
function sfortech_countdown_inline_css() {
    ?>
    <style>
    .sfortech-offer-wrapper {
        text-align: center;
        padding: 30px 15px;
    }
    .sfortech-headline {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    .sfortech-subheadline {
        font-size: 15px;
        margin-bottom: 30px;
    }
    .sfortech-timer {
        display: flex;
        justify-content: center;
        gap: 40px;
    }
    .sfortech-timer span {
        font-size: 48px;
        font-weight: 700;
        display: block;
    }
    .sfortech-timer small {
        font-size: 12px;
        letter-spacing: 1px;
    }
    @media (max-width: 768px) {
        .sfortech-timer span {
            font-size: 34px;
        }
    }
    </style>
    <?php
}
add_action('wp_head', 'sfortech_countdown_inline_css');
