<div class="row column1 loadingPlaceholders">
    @for ($j = 0; $j < 2; $j++) <!-- You can increase the count as needed -->
    <div class="col-md-6 col-lg-6">
        <div class="full white_shd margin_bottom_30 loading-card">
            <div class="info_people">
                <div class="p_info_img">
                    <div class="skeleton skeleton-img"></div>
                </div>
                <div class="user_info_cont">
                    <h4><div class="skeleton skeleton-text short"></div></h4>
                    <p class="truncate"><div class="skeleton skeleton-text"></div></p>
                    <p class="p_status">
                        <div class="skeleton skeleton-tag"></div>
                        <div class="skeleton skeleton-tag"></div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>
