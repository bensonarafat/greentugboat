<div class="blogDetails-share itSocial d-flex align-items-center">
    <div class="blogDetails-title">
    <h3 class="blogDetails-title__heading text-uppercase">Share</h3>
    </div>
    <ul>
    <li>
        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ config("app.url") . 'discussion/'. $post->id . '/' . $post->slug }}" rel="nofollow">
        <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a class="twitter" href="https://twitter.com/intent/tweet?url={{ config("app.url") . 'discussion/'. $post->id . '/' . $post->slug }}" rel="nofollow">
        <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a class="instagram" href="https://www.instagram.com/?url={{ config("app.url") . 'discussion/'. $post->id . '/' . $post->slug }}" rel="nofollow">
        <i class="fab fa-instagram"></i>
        </a>
    </li>
    </ul>
</div>
