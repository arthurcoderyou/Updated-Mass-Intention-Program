<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /*PEN STYLES*/

* {
  box-sizing: border-box;
}

body {
  background: #f1f1f1;
  display: flex;
  flex-direction:column;
  font-size: 1rem;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

$color_white: #fff;
$color_prime: #5ad67d;
$color_grey: #e2e2e2;
$color_grey_dark: #a2a2a2;

.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(#000, .1);
  margin-bottom: 1.6%;
  background: $color_white;
  line-height: 1.4;
  font-family: sans-serif;
  border-radius: 5px;
  overflow: hidden;
  z-index: 0;
  a {
    color: inherit;
    &:hover {
      color: $color_prime;
    }
  }
  &:hover {
    .photo {
      transform: scale(1.3) rotate(3deg);
    }
  }
  .meta {
    position: relative;
    z-index: 0;
    height: 200px;
  }
  .photo {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: center;
    transition: transform .2s;
  }
  .details,
  .details ul {
    margin: auto;
    padding: 0;
    list-style: none;
  }

  .details {
    position: absolute;
    top: 0;
    bottom: 0;
    left: -100%;
    margin: auto;
    transition: left .2s;
    background: rgba(#000, .6);
    color: $color_white;
    padding: 10px;
    width: 100%;
    font-size: .9rem;
    a {
      text-decoration: dotted underline
    }
    ul li {
      display: inline-block;
    }
    .author:before {
      font-family: FontAwesome;
      margin-right: 10px;
      content: "\f007";
    }

    .date:before {
      font-family: FontAwesome;
      margin-right: 10px;
      content: "\f133";
    }

    .tags {
      ul:before {
        font-family: FontAwesome;
        content: "\f02b";
        margin-right: 10px;
      }
      li {
        margin-right: 2px;
        &:first-child {
          margin-left: -4px;
        }
      }
    }
  }
  .description {
    padding: 1rem;
    background: $color_white;
    position: relative;
    z-index: 1;
    h1,
    h2 {
      font-family: Poppins, sans-serif;
    }
    h1 {
      line-height: 1;
      margin: 0;
      font-size: 1.7rem;
    }
    h2 {
      font-size: 1rem;
      font-weight: 300;
      text-transform: uppercase;
      color: $color_grey_dark;
      margin-top: 5px;
    }
    .read-more {
      text-align: right;
      a {
        color: $color_prime;
        display: inline-block;
        position: relative;
        &:after {
          content: "\f061";
          font-family: FontAwesome;
          margin-left: -10px;
          opacity: 0;
          vertical-align: middle;
          transition: margin .3s, opacity .3s;
        }

        &:hover:after {
          margin-left: 5px;
          opacity: 1;
        }
      }
    }
  }
  p {
    position: relative;
    margin: 1rem 0 0;
    &:first-of-type {
      margin-top: 1.25rem;
      &:before {
        content: "";
        position: absolute;
        height: 5px;
        background: $color_prime;
        width: 35px;
        top: -0.75rem;
        border-radius: 3px;
      }
    }
  }
  &:hover {
    .details {
      left: 0%;
    }
  }


  @media (min-width: 640px) {
    flex-direction: row;
    max-width: 700px;
    .meta {
      flex-basis: 40%;
      height: auto;
    }
    .description {
      flex-basis: 60%;
      &:before {
        transform: skewX(-3deg);
        content: "";
        background: #fff;
        width: 30px;
        position: absolute;
        left: -10px;
        top: 0;
        bottom: 0;
        z-index: -1;
      }
    }
    &.alt {
      flex-direction: row-reverse;
      .description {
        &:before {
          left: inherit;
          right: -10px;
          transform: skew(3deg)
        }
      }
      .details {
        padding-left: 25px;
      }
    }
  }
}
    </style>

</head>
<body>
    <div class="blog-card">
        <div class="meta">
          <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
          <ul class="details">
            <li class="author"><a href="#">John Doe</a></li>
            <li class="date">Aug. 24, 2015</li>
            <li class="tags">
              <ul>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Code</a></li>
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="description">
          <h1>Learning to Code</h1>
          <h2>Opening a door to the future</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
          <p class="read-more">
            <a href="#">Read More</a>
          </p>
        </div>
      </div>
      <div class="blog-card alt">
        <div class="meta">
          <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
          <ul class="details">
            <li class="author"><a href="#">Jane Doe</a></li>
            <li class="date">July. 15, 2015</li>
            <li class="tags">
              <ul>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Code</a></li>
                <li><a href="#">JavaScript</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="description">
          <h1>Mastering the Language</h1>
          <h2>Java is not the same as JavaScript</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
          <p class="read-more">
            <a href="#">Read More</a>
          </p>
        </div>
      </div>
</body>
</html>
