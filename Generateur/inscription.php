<?php

    session_start();

    // Si l'utilisateur a bien démarré une session, on le redirige vers son wall
    if( isset( $_SESSION['user'] ) )
    {
        header("Location: wall.php");   
    }

    require_once "imagineyourwebsite.inc.php";
    echo Layout::header('IYWS - Inscription');

?>

    <!-- Contenu de la page -->
    <middle>    
         <div id="enterInscription">
            <div id="title">
                <b>En vous inscrivant sur ImagineYourWebSite.com vous reconnaissez avoir lu et accepté les conditions suivantes :</b><br /><br />
            </div>
            <!-- FORMULAIRE D'INSCRIPTION -->
            <div id="inscription">
                <b>Saisissez votre login :</b><br />
                <input type="text" id="login" placeholder="Mon login" class="emptyField" onKeyUp="checkLogin( this.value );" />&nbsp;<span id="loginConfirmImg"></span><br /><br />

                <b>Saisissez votre adresse mail :</b><br />
                <input type="text" id="mail" placeholder="Mon adresse mail" class="emptyField" onKeyUp="checkMail( this.value );" />&nbsp;<span id="mailConfirmImg"></span><br /><br />

                <b>Saisissez votre mot de passe :</b><br />
                <input type="password" id="pwd" placeholder="Mon mot de passe" class="emptyField"/><br /><br />
                <input type="password" id="pwdConfirm" placeholder="Confirmation" class="emptyField" onKeyUp="checkPassword( this.value );" />&nbsp;<span id="pwdConfirmImg"></span><br /><br />

                <input type="submit" value="Valider" id="authenticationSubmit" onClick="validInscription();" /><br /><br />
            </div>

            <div id="instructions">
                        <b><u>Conditions Générales d'Utilisation</u></b><br /><br />
                    
                        En vous connectant sur le site www.imagineyourwebsite.com, vous vous engagez à respecter les présentes Conditions Générales d'Utilisation du site imagineyourwebsite.com qui seront susceptibles d'être modifiées librement à tout moment. Il vous est donc conseillé de vous référer régulièrement à la dernière version des Conditions Générales d'Utilisation disponibles en permanence sur le site. Toute personne "surfant" sur le site www.imagineyourwebsite.com est qualifiée d'"Utilisateur" par les présentes Conditions Générales d'Utilisation, et est à ce titre assujettie à son respect.<br /><br />

                        Nos services sont réservés aux personnes juridiquement capables de souscrire des contrats en droit français. Nos services ne sont pas disponibles pour les mineurs de moins de 18 ans, hormis sous l'autorité et la surveillance expresse de leurs parents ou de leur tuteur légal.<br /><br />

                        Création de site Internet et contenus

                        ImagineYourWebSite met à disposition un espace libre pour mettre en ligne des textes et des photos. Ces contenus ne doivent pas :<br />

                        Être illégaux au regard de la loi française. Il est entendu par illégal les sites traitant du hacking, piratage, warez, téléchargement illégal, incitant à la haine, au sexisme, à l'homophobie ou au crime, contenant du matériel pédophile, nazi… Être faux, imprécis, mensongers ou frauduleux, porter atteinte aux droits d'auteurs, aux droits des brevets ou des marques, aux secrets de fabrication, aux autres droits de propriété intellectuelle, au droit de divulgation ou à la vie privée des tiers. Être diffamatoires, médisants, calomnieux, discriminatoires ou inciter à la violence ou à la haine raciale, religieuse ou ethnique. Comporter de contenus obscènes, pornographiques ou pédophiles (même en texte). Contenir un programme informatique visant à endommager ou à intercepter clandestinement tout système informatique, données ou informations nominatives. Proposer à l'internaute de gagner de l'argent avec des méthodes soi-disant miracles (systèmes pyramidaux, affiliation, kits e-book, etc). Contenir uniquement de la publicité. Augmenter de façon fictive le trafic d'un site (ex : autosurf, popup under, barres de surf, etc.).<br /><br />

                    <b><u>Responsabilités</u></b><br /><br />

                    En cas de litige sur un site d'un membre la société n'est pas responsable, seul le propriétaire du compte qui est identifié avec un login et qui a accepté les présentes conditions générales d'utilisation est responsable du contenu de son site. Par le terme "contenu", on désigne l'ensemble des textes, images et médias présents sur ses pages hormis les éléments de la charte graphique mis au point par ImagineYourWebSite.com.<br /><br />

                    En cas de non respect des présentes conditions générales d'utilisation, ImagineYourWebSite se réserve le droit de supprimer le compte et le site de l'utilisateur sans aucun préavis.<br /><br />

                    <b><u>Obligations de l'utilisateur</u></b><br /><br />

                    L'utilisateur s'engage lors de son inscription à donner des informations véridiques, correctes et complètes.<br /><br />

                    L'Utilisateur s'engage à ce que le contenu de son site soit en conformité avec les lois et règlements en vigueur. Il est rappelé que seul l'Utilisateur est responsable du contenu qu'il diffuse sur Internet et sur son site, en aucun cas Imagine Your Web Site ne sera considéré comme responsable du contenu d'un Utilisateur.<br /><br />

                    L'Utilisateur s'engage à ce que le contenu de son site ne porte pas atteinte aux droits des tiers. L'utilisateur doit notifier immédiatement à ImagineYourWeb Site toute décision judiciaire relative au nom de domaine, au contenu ou affectant plus généralement les services utilisés et le compte de l'utilisateur.<br /><br />

                    L'Utilisateur autorise ImagineYourWebSite à faire la promotion de son site, de quelque manière que ce soit et par tout moyen de communication (en particulier la réutilisation de tout ou partie du site, du visuel de celui-ci, ajout de liens à partir et vers le site). ImagineYourWebSite ne peut être considéré comme responsable des dommages liés à cette promotion.<br /><br />

                    L'Utilisateur garantit que toutes les informations, données, fichiers, films, photographies, logiciels, ou bases de données lui appartiennent ou sont libres de droit.<br /><br />

                    L'Utilisateur s'engage à ne pas utiliser les outils mis à disposition par ImagineYourWebSite dans un but autre que la publication de pages personnelles ou professionnelles (en particulier à des fins de stockage de données).<br /><br />

                    L'Utilisateur s'engage à ne pas inclure sur son site des adresses ou des liens hypertextes renvoyant vers des sites extérieurs qui soient contraires aux lois et règlements en vigueur, et qui portent atteinte aux droits des tiers ou qui soient contraires aux présentes Conditions d'Utilisation.<br /><br />

                    <b><u>Responsabilités de ImagineYourWebSite</u></b><br /><br />

                    ImagineYourWebSite ne peut être considéré comme responsable du contenu des pages de l'Utilisateur. L'Utilisateur accepte et reconnaît qu'il est seul responsable des informations, textes, images, données, fichiers, programmes contenus dans son site, son site.<br /><br />

                    L'Utilisateur accepte de faire son affaire personnelle et de dégager ImagineYourWebSite de toute responsabilité, perte, réclamation, litige, dommage ou dépense, y compris les frais de justice et de défense, revendiqués par un tiers ou par un autre Utilisateur du fait de son site ou sa page personnelle.<br /><br />

                    ImagineYourWebSite est tenu à une obligation de moyens dans le cadre des présentes Conditions d'Utilisation et ne saurait en aucun cas être responsable de toute perte, préjudice ou dommage indirect de quelque nature que ce soit résultant de la gestion, l'utilisation, l'exploitation, d'une interruption ou d'un dysfonctionnement du Service.<br /><br />

                    ImagineYourWebSite ne peut être considéré comme responsable du contenu des sites extérieurs, du fonctionnement de l'accès à ces sites. ImagineYourWebSite n'approuve pas et n'est pas responsable du contenu, des idées, des opinions, des produits ou services vendus sur ces sites extérieurs.<br /><br />

                    L'Utilisateur reconnaît être seul responsable des liens hypertextes et adresses Internet qu'il inclut sur son site et garantit ImagineYourWebSite contre tout litige ou toute réclamation relative à ces liens.<br /><br />

                    ImagineYourWebSite ne garantit pas contre et ne peut être considéré comme responsable de la perte ou de l'altération des fichiers ou données que l'Utilisateur transfère sur son site.<br /><br />

                    L'Utilisateur accepte de transférer ces données et fichiers sous sa seule responsabilité et en connaissance de cause. Il incombe à l'Utilisateur d'effectuer toute mesure de sauvegarde qu'il lui semblera nécessaire.<br /><br />

                    ImagineYourWebSite se réserve le droit d'inclure un bandeau publicitaire ou une fenêtre surgissante à caractère publicitaire sur le site de l'Utilisateur, quel que soit l'annonceur. Cependant ImagineYourWebSite s'engage à ne diffuser aucune campagne allant contre les règles imposées aux utilisateurs de ImagineYourWebSite.com. Ainsi, aucune bannière érotique ou pornographique ne sera diffusée sur le réseau de sites ImagineYourWebSite.com.<br /><br />

                    En aucun cas, l'Utilisateur ne pourra exiger un prix ou une indemnisation de la part de ImagineYourWebSite ou de l'annonceur. ImagineYourWebSite se réserve le droit de supprimer, modifier, déplacer ce bandeau publicitaire sans autorisation préalable de l'Utilisateur.<br /><br />

                    ImagineYourWebSite ne pourrait être tenu pour responsable en cas d'interruption de service et se réserve la possibilité de suspendre son service pour des raisons de maintenance ou de mise à jour.<br /><br />

                    ImagineYourWebSite ne garantit pas une fréquentation minimum du site de l'Utilisateur.<br /><br />

                    ImagineYourWebSite ne garantit pas non plus la réalisation d'un quelconque chiffre d'affaire ou bénéfice par l'Utilisateur.<br /><br />

                    ImagineYourWebSite ne peut notamment être considérée comme responsable :<br />
                    - du mauvais fonctionnement, de la discontinuité ou de la mauvaise qualité des services proposés sur le site de l'Utilisateur;<br />
                    - de la non conclusion ou de tout litige dans la conclusion ou l'exécution d'un contrat proposé sur le site de l'Utilisateur;<br />
                    - des vices cachés, de la conformité, de la légalité ou de la dangerosité des biens et services proposés sur le site de l'Utilisateur;<br />
                    - des mensonges, exagérations, dols, violences, réticences dolosives commise par l'Utilisateur.
            </div>
        </div>
    </middle>

    <script type="text/javascript" src="js/inscription.js"></script>

<?php

    echo Layout::footer();

