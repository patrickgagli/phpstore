    <footer class="fixed-bottom">
        <div class="container">
            <?php
            $current_year = date("Y");
            $footer_text = "© Php Store " . $current_year;
            ?>
            <p class="row justify-content-center">
                <?php echo $footer_text; ?>
                By PG
            </p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Theme Darkly Js -->
    <script src="/../assets/js/bootstrap.bundle.min.js"></script>
    <script src="/../assets/js/prism.js" data-manual></script>
    <script src="/../assets/js/custom.js"></script>
    <!-- Chat list page script -->
    <script>
        $(document).ready(function() {
            var profiles = <?php echo json_encode($profiles); ?>;
        
            $('#receiver-select').change(function() {
                var selectedPseudo = $(this).val();
                var selectedProfile = profiles.find(profile => profile.pseudo === selectedPseudo);
                var profileId = selectedProfile ? selectedProfile.id : '';
                $('#receiver-id').val(profileId);
            });
        });
    </script>     
</body>
</html>


