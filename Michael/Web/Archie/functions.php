<?php
function getModal($row){

    return '<div class="modal fade " id="firstModal'.$row["id"].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><!--This class matches the button target-->
            <div class="modal-dialog modal-lg"><!--This will also affect your modal size, look into it-->
                <div class="modal-content">
                    <div id="carousel-controls'.$row["id"].'" class="carousel slide" data-ride="carousel"><!--This calls the controls for the carousel, note the id-->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active" align="center">
                                <img class="img-responsive" src="'.$row["picture_file"].'" alt="..." width="500" height="500">
                                <div class="carousel-caption">
                                    ***'.$row["name"].'****
                                </div>
                            </div>
                            <div class="item" align="center">
                                <iframe src="'.$row["text_file"].'" width="500" height="500"></iframe>
                                <div class="carousel-caption">
                               
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-controls'.$row["id"].'" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-controls'.$row["id"].'" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>';

}
