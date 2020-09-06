<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        @if(Request::is('admin*'))
        <li class="">
            <a href="{{url('admin/dashboard')}}">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li class="{{Request::is('admin/tag*') ? 'active' : ''}}">
            <a href="{{route('tag.index')}}">
                <i class="material-icons">tag</i>
                <span>Tag</span>
            </a>
        </li>
        <li class="{{Request::is('admin/categorie*') ? 'active' : ''}}">
            <a href="{{route('categorie.index')}}">
                <i class="material-icons">category</i>
                <span>Category</span>
            </a>
        </li>
        <li class="{{Request::is('admin/post*') ? 'active' : ''}}">
            <a href="{{url('admin/post')}}">
                <i class="material-icons">dashboard</i>
                <span>Post</span>
            </a>
        </li>
        <li class="{{Request::is('admin/postpending*') ? 'active' : ''}}">
            <a href="{{url('admin/postpending')}}">
                <i class="material-icons">explore</i>
                <span>Pending Post</span>
            </a>
        </li>
        <li class="{{Request::is('admin/favorite-post*') ? 'active' : ''}}">
            <a href="{{url('admin/favorite-post')}}">
                <i class="material-icons">explore</i>
                <span>Favorit Post</span>
            </a>
        </li>
        <li class="{{Request::is('admin/subscribe*') ? 'active' : ''}}">
            <a href="{{url('admin/subscribe/email')}}">
                <i class="material-icons">explore</i>
                <span>Subscriber</span>
            </a>
        </li>
        <li class="">
            <a href="{{route('post.index')}}">
                <i class="material-icons">hearing</i>
                <span>Comments</span>
            </a>
        </li>
        <li class="header">System</li>
        <li class="{{Request::is('admin/settings*') ? 'active' : ''}}">
            <a href="{{route('admin.setting')}}">
                <i class="material-icons">Setting</i>
                <span>setting</span>
            </a>
        </li>
        <li>
          <a href="href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();""><i class="material-icons">input</i>
              <span>Sign Out</span>
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <li class="header">LABELS</li>
        <li>
          <li class="">
              <a href="{{url('author/post')}}">
                  <i class="material-icons">launch</i>
                  <span>Post</span>
              </a>
          </li>
          <li class="{{Request::is('author/settings*') ? 'active' : ''}}">
              <a href="{{route('author.setting')}}">
                  <i class="material-icons">Setting</i>
                  <span>setting</span>
              </a>
          </li>
          <li class="">
              <a href="{{route('author.favoritepost')}}">
                  <i class="material-icons">favorite</i>
                  <span>Favorit Posts</span>
              </a>
          </li>
        <li>
          <a href="href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();""><i class="material-icons">input</i>
              <span>Sign Out</span>
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
    @endif
</div>
<!-- #Menu -->
