<?php /** Template Name: Page Customer Support */
get_header();
?>

    <div class="container-fluid request-demo page-with-form customer-support-form">
        <div class="container request-demo__container">
			<?php echo esc_html( get_template_part( 'template-parts/template-heading' ) ); ?>
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
                hbspt.forms.create({
                    region: "na1",
                    portalId: "21350294",
                    formId: "2649435b-35e0-49da-b538-e3c3ad00c7c5"
                });
            </script>
        </div>
    </div>

<?php
get_footer();
