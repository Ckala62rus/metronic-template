<template>
    <div class="container">
        <div class="blog">
            <div class="blog-content">
                <div class="blog-content-left">
                    <div class="blog-articals">
                        <div class="blog-artical">

                            <div class="blog-artical-info">
                                <div class="blog-artical-info-img">
                                    <a href="single.html"><img src="front/images/8.jpg" title="post-name"></a>

                                </div>
                                <div class="blog-artical-info-head">
                                    <h2><a href="single.html">Simply dummy text of the</a></h2>
                                    <h6>Posted on, 12 July 2014 at 10.30am by <a href="#"> admin</a></h6>

                                </div>
                                <div class="blog-artical-info-text">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text of the printing and typesetting industry. Lorem Ipsum dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy has been the industry's standard dummy has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<a href="#">[...]</a></p>
                                </div>
                                <div class="artical-links">
                                    <ul>
                                        <li><small> </small><span>june 14, 2013</span></li>
                                        <li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
                                        <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
                                        <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
                                        <li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <!--start-blog-pagenate-->
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!--//End-blog-pagenate-->
                </div>
                <div class="blog-content-right">
                    <div class="b-search">
                        <form>
                            <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                            <input type="submit" value="" placeholder="">
                        </form>
                    </div>
                    <!--start-twitter-weight-->
                    <div class="twitter-weights">
                        <h3>Tweet Widget</h3>
                        <div class="twitter-weight-grid">
                            <h4><span> </span>John Doe</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
                            <i><a href="#">2 days ago</a></i>
                        </div>
                        <div class="twitter-weight-grid">
                            <h4><span> </span>John Doe</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
                            <i><a href="#">2 days ago</a></i>
                        </div>
                        <a class="twittbtn" href="#">See all Tweets</a>
                    </div>
                    <!--//End-twitter-weight-->
                    <!-- start-tag-weight-->
                    <div class="b-tag-weight">
                        <h3>Tags Weight</h3>
                        <ul>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">consectetur</a></li>
                            <li><a href="#">dolore</a></li>
                            <li><a href="#">aliqua</a></li>
                            <li><a href="#">sit amet</a></li>
                            <li><a href="#">ipsum</a></li>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">consectetur</a></li>
                            <li><a href="#">dolore</a></li>
                            <li><a href="#">aliqua</a></li>
                            <li><a href="#">sit amet</a></li>
                            <li><a href="#">ipsum</a></li>
                        </ul>
                    </div>
                    <!---- //End-tag-weight---->
                </div>
                <div class="clearfix"> </div>

            </div>
        </div>
        <!-- /Blog -->
    </div>
</template>

<script>
export default {
    name: "Index",

    data(){
        return {
            search: '',
        }
    },
}
</script>

<style scoped>

</style>
