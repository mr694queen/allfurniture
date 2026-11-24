<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{ $settings->get('seo_description')?->value ?? 'ALL FURNITURE â€” Furniture premium berkualitas tinggi untuk rumah, sekolah, dan kantor.' }}">
<title>{{ $settings->get('seo_title')?->value ?? 'ALL FURNITURE â€” Furniture Premium Indonesia' }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<style>
/* ==========================================================
   ALL FURNITURE â€” PREMIUM VISUAL SYSTEM v3 â€” WARM LIGHT BROWN
   Light Brown #B89578 | Warm #C6A487 | Beige #D8C1AA | Cream #F3EAE0
   Off-White #FAF9F7 | Lt Grey #F1F1F1 | Border #E2DED9
   Md Grey #A6A09A | Dk Grey #55514D | Charcoal #292725 | Black #171717
   ========================================================== */

/* â”€â”€ TOKENS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
:root{
  --wood:         #B89578;   /* Light Brown â€” primary brand    */
  --wood-d:       #9A7A61;   /* Warm Brown â€” darker variant    */
  --wood-l:       #C6A487;   /* Warm Brown â€” lighter           */
  --wood-ll:      #D8C1AA;   /* Soft Beige Brown               */
  --wood-pale:    #F3EAE0;   /* Cream â€” large background accents */
  --wood-xs:      #FAF6F1;   /* Warmest off-white              */
  --black:        #171717;
  --charcoal:     #292725;
  --charcoal-l:   #3A3835;
  --dk-grey:      #55514D;
  --md-grey:      #A6A09A;
  --lt-grey:      #F1F1F1;
  --soft:         #FAF9F7;
  --white:        #FFFFFF;

  /* Semantic shadows */
  --sh-xs: 0 1px 2px rgba(0,0,0,.04);
  --sh-sm: 0 2px 8px rgba(0,0,0,.06);
  --sh-md: 0 6px 24px rgba(0,0,0,.08);
  --sh-lg: 0 12px 48px rgba(0,0,0,.10);
  --sh-xl: 0 24px 72px rgba(0,0,0,.13);
  --sh-wood: 0 8px 32px rgba(184,149,120,.28);

  /* Border */
  --br:     rgba(0,0,0,.06);
  --br-l:   rgba(0,0,0,.03);
  --br-w:   rgba(184,149,120,.22);

  /* Radius */
  --r-sm: 4px;
  --r-md: 10px;
  --r-lg: 20px;
  --r-xl: 28px;

  /* Transitions */
  --ease: cubic-bezier(.4,0,.2,1);
  --t:    all .32s var(--ease);
  --t-slow: all .55s var(--ease);

  --mw: 1240px;
}

/* â”€â”€ RESET â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;font-size:16px;-webkit-text-size-adjust:100%}
body{font-family:'Inter',system-ui,sans-serif;background:var(--white);color:var(--black);line-height:1.65;overflow-x:hidden;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4,h5,h6{font-family:'Playfair Display',Georgia,serif;line-height:1.18;color:var(--charcoal)}
a{text-decoration:none;color:inherit}
img{max-width:100%;display:block}
button{cursor:pointer;font-family:inherit;border:none;background:none}
ul,ol{list-style:none}
::selection{background:var(--wood);color:var(--white)}
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-thumb{background:var(--wood-ll);border-radius:3px}
::-webkit-scrollbar-thumb:hover{background:var(--wood)}

/* â”€â”€ UTILITIES â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.container{max-width:var(--mw);margin:0 auto;padding:0 2rem}

/* Section spacing */
.s{padding:7rem 0}
.s--sm{padding:5rem 0}
.s--lg{padding:9rem 0}

/* Section BG variants */
.s-white{background:var(--white)}
.s-soft{background:var(--soft)}
.s-lt{background:var(--lt-grey)}
.s-wood-xs{background:var(--wood-xs)}
.s-charcoal{background:var(--charcoal)}
.s-wood-d{background:var(--wood-d)}

/* Texture overlay (grain effect via SVG data URI) */
.s-textured{position:relative}
.s-textured::before{
  content:'';position:absolute;inset:0;pointer-events:none;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='.03'/%3E%3C/svg%3E");
  background-size:300px;opacity:.6;z-index:0
}
.s-textured>*{position:relative;z-index:1}

/* Section header */
.sh{margin-bottom:3.5rem}
.sh--c{text-align:center}
.sh--c .sh__sub{margin:0 auto}

.sh__eyebrow{
  display:inline-flex;align-items:center;gap:.625rem;
  font-family:'Inter',sans-serif;font-size:.68rem;font-weight:700;
  letter-spacing:.18em;text-transform:uppercase;color:var(--wood);
  margin-bottom:.875rem
}
.sh__eyebrow::before{
  content:'';display:block;width:28px;height:2px;background:var(--wood);border-radius:1px;flex-shrink:0
}

.sh__title{
  font-size:clamp(1.75rem,3.2vw,2.75rem);font-weight:700;
  color:var(--charcoal);margin-bottom:.875rem;letter-spacing:-.02em
}
.sh__title--light{color:var(--white)}
.sh__title em{font-style:italic;color:var(--wood)}

.sh__line{
  width:48px;height:3px;
  background:linear-gradient(90deg,var(--wood),var(--wood-l));
  border-radius:2px;margin:.5rem 0 1.25rem
}
.sh--c .sh__line{margin:.5rem auto 1.25rem}

.sh__sub{
  font-size:.975rem;color:var(--md-grey);max-width:540px;line-height:1.75
}
.sh__sub--light{color:rgba(255,255,255,.65)}

/* â”€â”€ BUTTONS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.btn{
  display:inline-flex;align-items:center;gap:.5rem;
  font-family:'Inter',sans-serif;font-size:.855rem;font-weight:600;
  letter-spacing:.02em;padding:.8rem 1.875rem;
  border-radius:var(--r-sm);border:2px solid transparent;
  transition:var(--t);white-space:nowrap;line-height:1;
  position:relative;overflow:hidden
}
/* Shimmer on hover */
.btn::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.18),transparent);
  transform:translateX(-100%);transition:transform .5s ease
}
.btn:hover::after{transform:translateX(100%)}

.btn-primary{background:var(--wood);color:var(--white);border-color:var(--wood)}
.btn-primary:hover{background:var(--wood-d);border-color:var(--wood-d);transform:translateY(-3px);box-shadow:var(--sh-wood)}

.btn-outline{background:transparent;color:var(--wood);border-color:var(--wood)}
.btn-outline:hover{background:var(--wood);color:var(--white);transform:translateY(-3px)}

.btn-outline-light{background:transparent;color:var(--white);border-color:rgba(255,255,255,.45)}
.btn-outline-light:hover{background:var(--white);color:var(--charcoal);transform:translateY(-3px)}

.btn-ghost{background:transparent;color:var(--wood);border-color:transparent;padding-left:0;padding-right:0;gap:.5rem}
.btn-ghost:hover{color:var(--wood-d);gap:.875rem}
.btn-ghost::after{display:none}

.btn-icon{width:17px;height:17px;flex-shrink:0;transition:transform .25s var(--ease)}
.btn:hover .btn-icon{transform:translateX(3px)}
.btn-ghost:hover .btn-icon{transform:translateX(6px)}

/* Badge */
.badge{
  display:inline-block;font-size:.68rem;font-weight:700;
  letter-spacing:.06em;padding:.28rem .65rem;border-radius:2px;text-transform:uppercase
}
.badge-wood{background:var(--wood);color:var(--white)}
.badge-pale{background:var(--wood-pale);color:var(--wood-d)}
.badge-dark{background:var(--charcoal);color:var(--white)}

/* â”€â”€ ANIMATIONS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
/* Entrance classes applied by JS */
.anim{opacity:0;will-change:opacity,transform}
.anim-up  {transform:translateY(40px)}
.anim-down{transform:translateY(-24px)}
.anim-left{transform:translateX(-40px)}
.anim-right{transform:translateX(40px)}
.anim-scale{transform:scale(.92)}
.anim-fade{}

.anim.in{
  opacity:1;transform:translate(0) scale(1);
  transition:opacity .7s var(--ease),transform .7s var(--ease)
}
/* stagger helpers */
.d1{transition-delay:.08s!important}
.d2{transition-delay:.16s!important}
.d3{transition-delay:.24s!important}
.d4{transition-delay:.32s!important}
.d5{transition-delay:.40s!important}
.d6{transition-delay:.48s!important}
.d7{transition-delay:.56s!important}
.d8{transition-delay:.64s!important}

/* Clip reveal for images */
.clip-reveal{clip-path:inset(0 100% 0 0);transition:clip-path .85s var(--ease)}
.clip-reveal.in{clip-path:inset(0 0% 0 0)}

@media(prefers-reduced-motion:reduce){
  .anim,.clip-reveal,*{
    animation:none!important;transition-duration:.01ms!important;
    transform:none!important;opacity:1!important;clip-path:none!important
  }
}

/* â”€â”€ NAVBAR â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.nav{
  position:fixed;top:0;left:0;right:0;z-index:9000;
  background:rgba(255,255,255,.97);
  backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
  border-bottom:1px solid var(--br-l);
  transition:var(--t)
}
.nav.scrolled{
  box-shadow:0 2px 24px rgba(0,0,0,.08);
  border-bottom-color:var(--br)
}
.nav__inner{
  max-width:var(--mw);margin:0 auto;
  padding:0 2rem;height:70px;
  display:flex;align-items:center;gap:2rem
}
.nav__logo{
  font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;
  color:var(--wood-d);letter-spacing:.01em;flex-shrink:0;line-height:1
}
.nav__logo em{font-style:normal;color:var(--wood)}

.nav__links{
  display:flex;align-items:center;gap:.15rem;flex:1;justify-content:center
}
.nav__link{
  font-size:.82rem;font-weight:500;color:var(--dk-grey);
  padding:.45rem .7rem;border-radius:var(--r-sm);
  position:relative;transition:var(--t)
}
.nav__link::after{
  content:'';position:absolute;bottom:4px;left:50%;
  width:0;height:2px;background:var(--wood);border-radius:1px;
  transition:width .3s var(--ease),left .3s var(--ease)
}
.nav__link:hover{color:var(--wood);background:var(--wood-pale)}
.nav__link:hover::after,.nav__link.active::after{width:60%;left:20%}
.nav__link.active{color:var(--wood-d);font-weight:600}

.nav__cta{display:flex;align-items:center;gap:.75rem;flex-shrink:0}
.nav__cta .btn{font-size:.78rem;padding:.58rem 1.2rem}

.nav__burger{
  display:none;flex-direction:column;justify-content:center;
  gap:5px;width:36px;height:36px;padding:4px;flex-shrink:0;margin-left:auto
}
.nav__burger span{
  display:block;height:2px;background:var(--charcoal);
  border-radius:1px;transition:var(--t);transform-origin:center
}
.nav__burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.nav__burger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.nav__burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

/* Drawer */
.drawer{
  position:fixed;inset:0;z-index:8999;pointer-events:none
}
.drawer__bg{
  position:absolute;inset:0;background:rgba(23,23,23,.55);
  opacity:0;transition:opacity .3s ease;backdrop-filter:blur(4px)
}
.drawer__panel{
  position:absolute;top:0;right:0;bottom:0;width:min(320px,88vw);
  background:var(--white);transform:translateX(100%);
  transition:transform .38s cubic-bezier(.4,0,.2,1);
  display:flex;flex-direction:column;
  box-shadow:var(--sh-xl)
}
.drawer.open{pointer-events:auto}
.drawer.open .drawer__bg{opacity:1}
.drawer.open .drawer__panel{transform:translateX(0)}

.drawer__head{
  display:flex;align-items:center;justify-content:space-between;
  padding:1.25rem 1.5rem;border-bottom:1px solid var(--br)
}
.drawer__close{
  width:32px;height:32px;display:flex;align-items:center;justify-content:center;
  background:var(--lt-grey);border-radius:50%;color:var(--charcoal);transition:var(--t)
}
.drawer__close:hover{background:var(--wood-pale);color:var(--wood)}
.drawer__nav{flex:1;padding:1rem 0}
.drawer__nav a{
  display:flex;align-items:center;
  padding:.9rem 1.5rem;font-size:.95rem;font-weight:500;
  color:var(--charcoal);border-left:3px solid transparent;transition:var(--t)
}
.drawer__nav a:hover{color:var(--wood);background:var(--soft);border-left-color:var(--wood)}
.drawer__foot{
  padding:1.5rem;border-top:1px solid var(--br);
  display:flex;flex-direction:column;gap:.75rem
}
.drawer__foot .btn{justify-content:center}

/* â”€â”€ HERO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.hero{
  padding-top:70px;min-height:100vh;
  display:flex;align-items:center;
  background:var(--soft);
  position:relative;overflow:hidden
}

/* Decorative BG grid */
.hero__grid{
  position:absolute;inset:0;pointer-events:none;
  background-image:
    linear-gradient(rgba(184,149,120,.04) 1px,transparent 1px),
    linear-gradient(90deg,rgba(184,149,120,.04) 1px,transparent 1px);
  background-size:64px 64px
}

/* Large decorative circle */
.hero__circle{
  position:absolute;top:-20%;right:-8%;
  width:680px;height:680px;border-radius:50%;
  background:radial-gradient(circle at 40% 40%,var(--wood-pale) 0%,transparent 70%);
  pointer-events:none
}

.hero__inner{
  max-width:var(--mw);margin:0 auto;padding:5rem 2rem 4rem;
  display:grid;grid-template-columns:1fr 1fr;gap:5rem;
  align-items:center;position:relative;z-index:1;width:100%
}

/* Left column */
.hero__kicker{
  display:inline-flex;align-items:center;gap:.75rem;
  margin-bottom:1.75rem
}
.hero__kicker-dot{
  width:8px;height:8px;border-radius:50%;background:var(--wood);
  animation:pulse 2.5s ease-in-out infinite
}
@keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(184,149,120,.4)}50%{box-shadow:0 0 0 8px rgba(184,149,120,0)}}
.hero__kicker-line{width:32px;height:1px;background:var(--wood)}
.hero__kicker-text{
  font-size:.68rem;font-weight:700;letter-spacing:.18em;
  text-transform:uppercase;color:var(--wood)
}

.hero__h1{
  font-size:clamp(2rem,4.2vw,3.5rem);font-weight:700;
  color:var(--charcoal);line-height:1.1;
  margin-bottom:1.5rem;letter-spacing:-.025em
}
.hero__h1 em{
  font-style:italic;color:var(--wood);
  background:linear-gradient(135deg,var(--wood),var(--wood-d));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text
}

.hero__desc{
  font-size:1.025rem;color:var(--dk-grey);
  line-height:1.8;margin-bottom:2.5rem;max-width:460px
}

.hero__cta{
  display:flex;align-items:center;gap:1rem;
  margin-bottom:3.25rem;flex-wrap:wrap
}

.hero__stats{
  display:flex;gap:2.5rem;padding-top:2rem;
  border-top:1px solid var(--br);flex-wrap:wrap
}
.hero__stat-num{
  font-family:'Playfair Display',serif;font-size:1.75rem;
  font-weight:700;color:var(--wood-d);line-height:1;display:block
}
.hero__stat-label{
  font-size:.72rem;color:var(--md-grey);margin-top:.3rem;
  font-weight:500;letter-spacing:.03em
}

/* Right column â€” layered composition */
.hero__visual{position:relative;height:580px}

/* Main image */
.hero__img-main{
  position:absolute;top:0;right:0;
  width:88%;height:92%;border-radius:var(--r-lg);overflow:hidden;
  box-shadow:var(--sh-xl)
}
.hero__img-main img{
  width:100%;height:100%;object-fit:cover;object-position:center;
  transition:transform .8s var(--ease)
}
.hero__img-main:hover img{transform:scale(1.04)}

/* Accent image â€” smaller, bottom left, overlapping */
.hero__img-accent{
  position:absolute;bottom:0;left:0;
  width:45%;height:48%;border-radius:var(--r-md);overflow:hidden;
  box-shadow:var(--sh-lg);
  border:4px solid var(--white);z-index:2
}
.hero__img-accent img{width:100%;height:100%;object-fit:cover}

/* Geometric deco */
.hero__deco-frame{
  position:absolute;top:-1.5rem;right:-1.5rem;
  width:120px;height:120px;
  border:2px solid var(--wood-pale);border-radius:var(--r-md);
  pointer-events:none;z-index:0
}
.hero__deco-dot-grid{
  position:absolute;bottom:6%;right:-1rem;
  width:80px;height:80px;pointer-events:none;opacity:.35
}
.hero__deco-line{
  position:absolute;top:50%;left:3%;
  width:2px;height:120px;background:linear-gradient(to bottom,transparent,var(--wood-pale),transparent);
  transform:translateY(-50%);pointer-events:none
}

/* Floating info card */
.hero__card{
  position:absolute;bottom:12%;right:-1.5rem;
  background:var(--white);border-radius:var(--r-md);
  padding:1.1rem 1.375rem;box-shadow:var(--sh-lg);
  display:flex;align-items:center;gap:.875rem;
  z-index:3;min-width:180px;
  border:1px solid var(--br-l);
  animation:floatCard 4s ease-in-out infinite
}
@keyframes floatCard{0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
.hero__card-icon{
  width:40px;height:40px;background:var(--wood-pale);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  color:var(--wood);flex-shrink:0
}
.hero__card-strong{
  display:block;font-size:.85rem;font-weight:700;color:var(--charcoal)
}
.hero__card-sub{
  display:block;font-size:.72rem;color:var(--md-grey);margin-top:.1rem
}

/* Second floating card */
.hero__card2{
  position:absolute;top:10%;left:0;
  background:var(--wood-d);color:var(--white);
  border-radius:var(--r-md);padding:.875rem 1.125rem;
  box-shadow:var(--sh-wood);z-index:3;
  display:flex;align-items:center;gap:.625rem;
  animation:floatCard 4s ease-in-out .8s infinite
}
.hero__card2-text{font-size:.78rem;font-weight:600;color:var(--white)}
.hero__card2-sub{font-size:.68rem;color:rgba(255,255,255,.65);margin-top:.1rem;display:block}

/* Placeholder if no image */
.hero__placeholder{
  width:100%;height:100%;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
  display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1rem;
  color:var(--wood-l)
}
.hero__placeholder svg{width:64px;height:64px;opacity:.35}

/* â”€â”€ MARQUEE STRIP â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.strip{
  background:var(--charcoal);padding:.9rem 0;overflow:hidden;
  border-top:1px solid rgba(255,255,255,.05)
}
.strip__track{
  display:flex;gap:3rem;align-items:center;
  animation:marquee 28s linear infinite;white-space:nowrap;
  width:max-content
}
.strip__item{
  display:inline-flex;align-items:center;gap:.75rem;
  color:rgba(255,255,255,.55);font-size:.78rem;font-weight:500;
  letter-spacing:.05em;text-transform:uppercase
}
.strip__dot{width:4px;height:4px;border-radius:50%;background:var(--wood);flex-shrink:0}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}

/* â”€â”€ CATEGORIES â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
/* CATEGORIES CAROUSEL */
.cats-section{position:relative;overflow:hidden}
.cats-deco-1{position:absolute;top:5%;right:-5%;width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,var(--wood-pale) 0%,transparent 70%);opacity:.5;pointer-events:none;z-index:0}
.cats-deco-2{position:absolute;bottom:-10%;left:-3%;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,var(--wood-xs) 0%,transparent 70%);opacity:.6;pointer-events:none;z-index:0}
.cats-wrap{position:relative;z-index:1;padding:0 3rem}
.cats-track{display:flex;gap:1.25rem;overflow:hidden;scroll-behavior:smooth;-webkit-overflow-scrolling:touch;scrollbar-width:none;padding:.5rem 0 1rem}
.cats-track::-webkit-scrollbar{display:none}
.cat-card{position:relative;border-radius:var(--r-lg);overflow:hidden;background:var(--wood-pale);cursor:pointer;transition:transform .4s var(--ease),box-shadow .4s var(--ease);flex-shrink:0;border:none;outline:none;width:100%;text-align:left;display:block}
.cat-card--featured{flex:0 0 calc(50% - .625rem);min-height:420px}
.cat-card--regular{flex:0 0 calc(33.333% - .833rem);min-height:320px}
.cat-card:hover{transform:translateY(-6px);box-shadow:0 12px 40px rgba(184,149,120,.2)}
.cat-card__img-wrap{position:absolute;inset:0;overflow:hidden;border-radius:var(--r-lg)}
.cat-card__img{width:100%;height:100%;object-fit:cover;transition:transform .6s var(--ease)}
.cat-card:hover .cat-card__img{transform:scale(1.08)}
.cat-card__overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(23,23,23,.82) 0%,rgba(23,23,23,.15) 55%,transparent 100%);transition:opacity .3s ease}
.cat-card:hover .cat-card__overlay{background:linear-gradient(to top,rgba(78,52,46,.85) 0%,rgba(78,52,46,.2) 55%,transparent 100%)}
.cat-card__body{position:absolute;bottom:0;left:0;right:0;padding:1.5rem;color:var(--white);transform:translateY(4px);transition:transform .3s ease}
.cat-card:hover .cat-card__body{transform:translateY(0)}
.cat-card__icon{width:40px;height:40px;background:rgba(255,255,255,.15);backdrop-filter:blur(8px);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:.75rem;transition:var(--t)}
.cat-card:hover .cat-card__icon{background:var(--wood);transform:scale(1.1)}
.cat-card__icon svg{width:18px;height:18px;color:var(--white)}
.cat-card__tag{font-size:.62rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.5);margin-bottom:.35rem}
.cat-card__name{font-family:'Playfair Display',serif;font-size:1.15rem;font-weight:600;line-height:1.25;margin-bottom:.3rem}
.cat-card--featured .cat-card__name{font-size:1.5rem}
.cat-card__desc{font-size:.78rem;color:rgba(255,255,255,.6);line-height:1.5;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:.5rem}
.cat-card__arrow{display:inline-flex;align-items:center;gap:.35rem;font-size:.73rem;font-weight:600;color:var(--wood-ll);opacity:0;transform:translateY(6px);transition:var(--t)}
.cat-card:hover .cat-card__arrow{opacity:1;transform:translateY(0)}
.cat-card__arrow svg{width:12px;height:12px}
.cat-card__ph{position:absolute;inset:0;background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));display:flex;align-items:center;justify-content:center}
.cat-card__ph svg{width:40px;height:40px;color:var(--wood-l);opacity:.5}
.cats-nav{position:absolute;top:50%;transform:translateY(-50%);width:44px;height:44px;border-radius:50%;background:var(--white);border:1.5px solid var(--br);display:flex;align-items:center;justify-content:center;color:var(--wood);cursor:pointer;z-index:5;transition:var(--t);box-shadow:var(--sh-sm)}
.cats-nav:hover{background:var(--wood);color:var(--white);border-color:var(--wood);box-shadow:var(--sh-wood)}
.cats-nav:disabled{opacity:.35;cursor:not-allowed}
.cats-nav svg{width:18px;height:18px}
.cats-nav--prev{left:0}
.cats-nav--next{right:0}
.cats-controls{display:flex;align-items:center;justify-content:center;gap:1.5rem;margin-top:1.75rem;flex-wrap:wrap}
.cats-dots{display:flex;gap:.4rem;align-items:center}
.cats-dot{width:8px;height:8px;border-radius:50%;background:var(--wood-ll);border:none;cursor:pointer;transition:var(--t);padding:0}
.cats-dot.active{background:var(--wood);width:24px;border-radius:4px}
.cats-all-btn{display:inline-flex;align-items:center;gap:.45rem;font-size:.82rem;font-weight:600;color:var(--wood-d);background:var(--wood-pale);padding:.55rem 1.25rem;border-radius:50px;transition:var(--t);border:none;cursor:pointer}
.cats-all-btn:hover{background:var(--wood);color:var(--white)}

/* ALL CATEGORIES POPUP */
.catsall-ov{position:fixed;inset:0;z-index:9400;background:rgba(23,23,23,.6);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);display:flex;align-items:flex-start;justify-content:center;padding:1.5rem;overflow-y:auto;opacity:0;pointer-events:none;transition:opacity .3s ease}
.catsall-ov.open{opacity:1;pointer-events:auto}
.catsall-modal{background:var(--white);border-radius:var(--r-lg);width:100%;max-width:1000px;box-shadow:0 32px 80px rgba(0,0,0,.25);transform:scale(.96) translateY(16px);transition:transform .35s cubic-bezier(.22,.68,0,1.2),opacity .3s ease;opacity:0;position:relative;margin:auto;max-height:90vh;display:flex;flex-direction:column}
.catsall-ov.open .catsall-modal{transform:scale(1) translateY(0);opacity:1}
.catsall-close{position:absolute;top:1rem;right:1rem;width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.9);border:1.5px solid var(--br);color:var(--dk);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:var(--t);z-index:10}
.catsall-close:hover{background:var(--wood);color:var(--white);border-color:var(--wood)}
.catsall-close svg{width:16px;height:16px}
.catsall-header{padding:1.75rem 2rem 1.25rem;border-bottom:1px solid var(--br);flex-shrink:0}
.catsall-title{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--charcoal);margin-bottom:.3rem}
.catsall-desc{font-size:.84rem;color:var(--md-grey);line-height:1.55}
.catsall-search-wrap{position:relative;margin-top:1rem;max-width:400px}
.catsall-search-wrap svg{position:absolute;left:.875rem;top:50%;transform:translateY(-50%);width:15px;height:15px;color:var(--md-grey);pointer-events:none}
.catsall-search{width:100%;padding:.65rem .875rem .65rem 2.5rem;border:1.5px solid var(--br);border-radius:50px;font-family:'Inter',sans-serif;font-size:.85rem;color:var(--charcoal);outline:none;transition:border-color .22s ease,box-shadow .22s ease;background:var(--soft)}
.catsall-search:focus{border-color:var(--wood);box-shadow:0 0 0 3px rgba(184,149,120,.12);background:var(--white)}
.catsall-body{padding:1.5rem 2rem 2rem;overflow-y:auto;flex:1}
.catsall-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem}
.catsall-card{position:relative;border-radius:var(--r-md);overflow:hidden;cursor:pointer;transition:transform .3s ease,box-shadow .3s ease;background:var(--wood-pale);border:none;outline:none;text-align:left;display:block}
.catsall-card:hover{transform:translateY(-4px);box-shadow:0 8px 28px rgba(184,149,120,.2)}
.catsall-card__img-wrap{position:absolute;inset:0;overflow:hidden;border-radius:var(--r-md)}
.catsall-card__img{width:100%;height:100%;object-fit:cover;transition:transform .5s ease}
.catsall-card:hover .catsall-card__img{transform:scale(1.07)}
.catsall-card__overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(23,23,23,.82) 0%,rgba(23,23,23,.15) 55%,transparent 100%)}
.catsall-card__body{position:absolute;bottom:0;left:0;right:0;padding:1rem 1.125rem;color:var(--white)}
.catsall-card__name{font-family:'Playfair Display',serif;font-size:.95rem;font-weight:600;line-height:1.25;margin-bottom:.2rem}
.catsall-card__arrow{display:inline-flex;align-items:center;gap:.3rem;font-size:.68rem;font-weight:600;color:var(--wood-ll);opacity:0;transform:translateY(4px);transition:var(--t)}
.catsall-card:hover .catsall-card__arrow{opacity:1;transform:translateY(0)}
.catsall-card__arrow svg{width:11px;height:11px}
.catsall-card{aspect-ratio:4/5}
.catsall-empty{padding:3rem 1.5rem;text-align:center}
.catsall-empty-ico{width:56px;height:56px;border-radius:var(--r-md);background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:var(--wood-ll)}
.catsall-empty-ico svg{width:26px;height:26px}
.catsall-empty-t{font-size:.95rem;font-weight:700;color:var(--charcoal);margin-bottom:.35rem}
.catsall-empty-s{font-size:.82rem;color:var(--md-grey)}
@media(max-width:1024px){.catsall-grid{grid-template-columns:repeat(3,1fr)!important}}
@media(max-width:768px){.catsall-grid{grid-template-columns:repeat(2,1fr)!important}.catsall-header{padding:1.25rem 1.25rem 1rem}.catsall-body{padding:1rem 1.25rem 1.5rem}}
@media(max-width:480px){.catsall-grid{grid-template-columns:1fr!important}.catsall-ov{padding:.5rem}}
@media(max-width:768px){.cat-card--featured{flex:0 0 calc(50% - .625rem)!important;min-height:300px}.cat-card--regular{flex:0 0 calc(50% - .625rem)!important;min-height:260px}.cats-wrap{padding:0 2.5rem}}
@media(max-width:480px){.cat-card--featured{flex:0 0 100%!important;min-height:280px}.cat-card--regular{flex:0 0 100%!important;min-height:260px}.cats-wrap{padding:0 .5rem}}

/* â”€â”€ PRODUCTS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.products__grid{
  display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem
}

.prod-card{
  background:var(--white);border-radius:var(--r-md);
  overflow:hidden;border:1px solid var(--br);
  transition:var(--t-slow);display:flex;flex-direction:column;
  position:relative
}
.prod-card::before{
  content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--wood),var(--wood-l));
  transform:scaleX(0);transform-origin:left;transition:transform .4s var(--ease)
}
.prod-card:hover{transform:translateY(-10px);box-shadow:var(--sh-lg);border-color:transparent}
.prod-card:hover::before{transform:scaleX(1)}

.prod-card__img-wrap{
  position:relative;aspect-ratio:4/3;overflow:hidden;background:var(--lt-grey)
}
.prod-card__img{
  width:100%;height:100%;object-fit:cover;
  transition:transform .6s var(--ease)
}
.prod-card:hover .prod-card__img{transform:scale(1.1)}

/* Hover overlay with quick action */
.prod-card__ov{
  position:absolute;inset:0;
  background:rgba(23,23,23,.4);
  display:flex;align-items:center;justify-content:center;
  opacity:0;transition:opacity .35s ease
}
.prod-card:hover .prod-card__ov{opacity:1}
.prod-card__ov-btn{
  background:var(--white);color:var(--charcoal);
  font-size:.78rem;font-weight:700;
  padding:.65rem 1.25rem;border-radius:var(--r-sm);
  transform:translateY(10px);transition:var(--t);letter-spacing:.03em
}
.prod-card:hover .prod-card__ov-btn{transform:translateY(0)}
.prod-card__ov-btn:hover{background:var(--wood);color:var(--white)}

.prod-card__badge{position:absolute;top:.75rem;left:.75rem}

.prod-card__ph{
  width:100%;height:100%;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
  display:flex;align-items:center;justify-content:center
}
.prod-card__ph svg{width:36px;height:36px;color:var(--wood-l);opacity:.5}

.prod-card__body{padding:1.25rem 1.25rem .75rem;flex:1;display:flex;flex-direction:column}
.prod-card__cat{
  font-size:.68rem;font-weight:700;letter-spacing:.1em;
  text-transform:uppercase;color:var(--wood);margin-bottom:.4rem
}
.prod-card__name{
  font-family:'Playfair Display',serif;font-size:1rem;
  font-weight:600;color:var(--charcoal);margin-bottom:.5rem;line-height:1.3
}
.prod-card__price{
  font-size:.875rem;font-weight:700;color:var(--wood-d);
  margin-top:auto;padding-top:.625rem
}
.prod-card__foot{padding:.75rem 1.25rem 1.25rem}
.prod-card__foot .btn{
  width:100%;justify-content:center;font-size:.8rem;padding:.65rem 1rem
}

/* â”€â”€ ABOUT â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.about__inner{
  display:grid;grid-template-columns:1fr 1fr;gap:6rem;align-items:center
}

/* Image stack */
.about__imgs{position:relative;height:540px}
.about__img-main{
  position:absolute;top:0;left:0;width:80%;height:85%;
  border-radius:var(--r-lg);overflow:hidden;box-shadow:var(--sh-xl)
}
.about__img-main img{width:100%;height:100%;object-fit:cover}

.about__img-sec{
  position:absolute;bottom:0;right:0;width:52%;height:52%;
  border-radius:var(--r-md);overflow:hidden;
  border:5px solid var(--white);box-shadow:var(--sh-lg);z-index:2
}
.about__img-sec img{width:100%;height:100%;object-fit:cover}

/* Deco elements */
.about__deco-rect{
  position:absolute;top:-1.5rem;left:-1.5rem;
  width:100px;height:100px;
  border:2px solid var(--wood-pale);border-radius:var(--r-md);
  z-index:0;pointer-events:none
}
.about__deco-rect2{
  position:absolute;bottom:-1rem;right:-1rem;
  width:72px;height:72px;background:var(--wood-pale);
  border-radius:var(--r-sm);z-index:0;pointer-events:none
}

/* Stat strip inside about image */
.about__stat-strip{
  position:absolute;bottom:10%;left:-2rem;
  background:var(--wood-d);border-radius:var(--r-md);
  padding:1.25rem 1.5rem;box-shadow:var(--sh-wood);
  display:grid;grid-template-columns:1fr 1fr;gap:1rem 1.5rem;
  z-index:3;min-width:200px
}
.about__snum{
  font-family:'Playfair Display',serif;font-size:1.5rem;
  font-weight:700;color:var(--white);line-height:1;display:block
}
.about__slabel{
  font-size:.68rem;color:rgba(255,255,255,.6);
  margin-top:.2rem;font-weight:500;letter-spacing:.04em
}

/* About content */
.about__vm{
  display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;margin:1.75rem 0
}
.about__vm-item{
  background:var(--soft);border-radius:var(--r-md);
  padding:1.25rem;border-left:3px solid var(--wood)
}
.about__vm-tag{
  font-size:.68rem;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:var(--wood);margin-bottom:.5rem
}
.about__vm-text{font-size:.875rem;color:var(--dk-grey);line-height:1.65}

.about__desc{
  font-size:.975rem;line-height:1.85;color:var(--dk-grey);margin-bottom:.25rem
}

/* â”€â”€ FEATURES â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.feats-wrap{position:relative;padding:0 3rem}
.feats-track{
  display:flex;gap:1.25rem;overflow:hidden;
  scroll-behavior:smooth;
  -webkit-overflow-scrolling:touch;
  scrollbar-width:none;
  padding:.5rem 0 1rem;
}
.feats-track::-webkit-scrollbar{display:none}
.feat-page{display:none}
.feat-page.active{display:grid;grid-template-columns:repeat(3,1fr);gap:1.375rem}
.feat-card{
  background:var(--white);border-radius:var(--r-md);
  padding:1.75rem;border:1px solid var(--br);
  transition:var(--t-slow);position:relative;overflow:hidden;
  display:flex;flex-direction:column;
}
.feat-card::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--wood),var(--wood-l));
  opacity:0;transition:opacity .3s ease;
}
.feat-card::after{
  content:'';position:absolute;bottom:-30px;right:-20px;
  width:80px;height:80px;border-radius:50%;
  background:linear-gradient(135deg,var(--wood-pale),transparent);
  opacity:.4;pointer-events:none;
}
.feat-card:hover{transform:translateY(-5px);box-shadow:var(--sh-md);border-color:var(--br-w)}
.feat-card:hover::before{opacity:1}
.feat-card__icon{
  position:relative;z-index:1;
  width:52px;height:52px;
  background:linear-gradient(135deg,var(--wood-pale),var(--wood-xs));
  border-radius:var(--r-md);display:flex;align-items:center;
  justify-content:center;margin-bottom:1.25rem;color:var(--wood);
  transition:var(--t);
}
.feat-card:hover .feat-card__icon{
  background:linear-gradient(135deg,var(--wood),var(--wood-d));
  color:var(--white);transform:scale(1.1);
  box-shadow:0 4px 16px rgba(184,149,120,.3);
}
.feat-card__title{
  position:relative;z-index:1;
  font-size:1rem;font-weight:600;color:var(--charcoal);margin-bottom:.5rem;
}
.feat-card__desc{
  position:relative;z-index:1;
  font-size:.85rem;color:var(--md-grey);line-height:1.7;
}
.feat-nav{
  position:absolute;top:50%;transform:translateY(-50%);
  width:42px;height:42px;border-radius:50%;
  background:var(--white);border:1.5px solid var(--br);
  display:flex;align-items:center;justify-content:center;
  color:var(--wood);cursor:pointer;z-index:5;
  transition:var(--t);box-shadow:var(--sh-sm);
}
.feat-nav:hover{background:var(--wood);color:var(--white);border-color:var(--wood);box-shadow:var(--sh-wood)}
.feat-nav:disabled{opacity:.35;cursor:not-allowed}
.feat-nav svg{width:18px;height:18px}
.feat-nav--prev{left:0}
.feat-nav--next{right:0}
.feat-controls{
  display:flex;align-items:center;justify-content:center;
  gap:1.25rem;margin-top:1.5rem;flex-wrap:wrap;
}
.feat-dots{display:flex;gap:.4rem;align-items:center}
.feat-dot{
  width:8px;height:8px;border-radius:50%;
  background:var(--wood-ll);border:none;cursor:pointer;
  transition:var(--t);padding:0;
}
.feat-dot.active{background:var(--wood);width:24px;border-radius:4px}
.feat-counter{font-size:.78rem;color:var(--md-grey);white-space:nowrap}
.feat-counter strong{color:var(--wood-d);font-weight:700}
@media(max-width:768px){
  .feat-page.active{grid-template-columns:repeat(2,1fr)!important}
  .feats-wrap{padding:0 2.5rem}
}
@media(max-width:480px){
  .feat-page.active{grid-template-columns:1fr!important}
  .feats-wrap{padding:0 .5rem}
}

/* â”€â”€ STEPS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.steps__inner{
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:2rem;position:relative
}
.steps__inner::before{
  content:'';position:absolute;top:34px;
  left:calc(12.5% + .5rem);right:calc(12.5% + .5rem);
  height:1px;
  background:linear-gradient(90deg,var(--wood-pale),var(--wood-ll),var(--wood-pale));
  z-index:0
}
.step-item{text-align:center;position:relative;z-index:1}
.step-item__num{
  width:56px;height:56px;background:var(--white);
  border:2px solid var(--wood-pale);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 1.25rem;
  font-family:'Playfair Display',serif;font-size:1rem;
  font-weight:700;color:var(--wood);transition:var(--t);
  box-shadow:var(--sh-sm)
}
.step-item:hover .step-item__num{
  background:var(--wood);color:var(--white);
  border-color:var(--wood);box-shadow:var(--sh-wood);
  transform:scale(1.1)
}
.step-item__title{font-size:.95rem;font-weight:600;color:var(--charcoal);margin-bottom:.5rem}
.step-item__desc{font-size:.82rem;color:var(--md-grey);line-height:1.65}

/* â”€â”€ PORTFOLIO â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
/* Featured + grid layout */
.port__layout{
  display:grid;
  grid-template-columns:1fr 1fr;
  grid-template-rows:auto auto;
  gap:1.25rem
}
.port__layout > *:first-child{
  grid-row:span 2
}

.port-card{
  border-radius:var(--r-md);overflow:hidden;
  background:var(--lt-grey);position:relative;
  transition:var(--t-slow)
}
.port-card:hover{transform:translateY(-5px);box-shadow:var(--sh-lg)}

/* First card (featured) */
.port__layout > .port-card:first-child{
  aspect-ratio:3/4
}
/* Remaining cards */
.port__layout > .port-card:not(:first-child){
  aspect-ratio:16/9
}

.port-card__img{
  width:100%;height:100%;object-fit:cover;
  transition:transform .6s var(--ease)
}
.port-card:hover .port-card__img{transform:scale(1.07)}

.port-card__ov{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(23,23,23,.75) 0%,transparent 55%);
  transition:var(--t)
}
.port-card:hover .port-card__ov{
  background:linear-gradient(to top,rgba(154,122,97,.85) 0%,rgba(154,122,97,.15) 55%,transparent 100%)
}

.port-card__body{
  position:absolute;bottom:0;left:0;right:0;padding:1.5rem;
  transform:translateY(4px);transition:var(--t)
}
.port-card:hover .port-card__body{transform:translateY(0)}

.port-card__cat{
  font-size:.65rem;font-weight:700;letter-spacing:.15em;
  text-transform:uppercase;color:var(--wood-ll);margin-bottom:.4rem
}
.port-card__name{
  font-family:'Playfair Display',serif;font-size:1.1rem;
  font-weight:600;color:var(--white);margin-bottom:.35rem;line-height:1.25
}
.port-card__meta{
  font-size:.75rem;color:rgba(255,255,255,.6);
  display:flex;align-items:center;gap:.4rem
}
.port-card__meta svg{width:11px;height:11px;flex-shrink:0}

.port-card__ph{
  width:100%;height:100%;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
  display:flex;align-items:center;justify-content:center
}
.port-card__ph svg{width:48px;height:48px;color:var(--wood-l);opacity:.4}

/* Right sub-grid */
.port__right{
  display:grid;grid-template-rows:1fr 1fr;gap:1.25rem
}

/* â”€â”€ TESTIMONIALS â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.testi__wrap{position:relative}

.testi__slider{
  display:flex;gap:1.5rem;
  overflow:hidden;cursor:grab;user-select:none
}
.testi__slider.dragging{cursor:grabbing}

.testi-card{
  background:var(--white);border-radius:var(--r-md);
  padding:2rem;border:1px solid var(--br);
  flex:0 0 calc(33.333% - 1rem);
  transition:var(--t);display:flex;flex-direction:column;gap:1.25rem;
  position:relative
}
.testi-card::before{
  content:'\201C';
  position:absolute;top:1.25rem;right:1.5rem;
  font-family:'Playfair Display',serif;font-size:5rem;
  line-height:.8;color:var(--wood-pale);font-weight:700;
  transition:color .3s ease
}
.testi-card:hover::before{color:var(--wood-xs)}
.testi-card:hover{
  box-shadow:var(--sh-md);border-color:var(--br-w);transform:translateY(-4px)
}

.testi-card__stars{display:flex;gap:3px;color:var(--wood)}
.testi-card__stars svg{width:14px;height:14px}

.testi-card__text{
  font-size:.925rem;line-height:1.8;color:var(--dk-grey);flex:1
}
.testi-card__author{
  display:flex;align-items:center;gap:.875rem;
  border-top:1px solid var(--br);padding-top:1rem
}
.testi-card__av{
  width:44px;height:44px;border-radius:50%;
  object-fit:cover;background:var(--lt-grey);flex-shrink:0
}
.testi-card__av-ph{
  width:44px;height:44px;border-radius:50%;
  background:var(--wood-pale);display:flex;align-items:center;justify-content:center;
  color:var(--wood-d);font-family:'Playfair Display',serif;
  font-size:1.05rem;font-weight:700;flex-shrink:0
}
.testi-card__name{font-size:.9rem;font-weight:700;color:var(--charcoal)}
.testi-card__proj{font-size:.75rem;color:var(--md-grey);margin-top:.15rem}

/* Slider controls */
.testi__ctrl{
  display:flex;align-items:center;justify-content:center;
  gap:1rem;margin-top:2.5rem
}
.testi__btn{
  width:44px;height:44px;border-radius:50%;background:var(--white);
  border:1.5px solid var(--br-w);display:flex;align-items:center;justify-content:center;
  color:var(--wood);transition:var(--t)
}
.testi__btn:hover{background:var(--wood);color:var(--white);border-color:var(--wood)}
.testi__btn svg{width:18px;height:18px}
.testi__dots{display:flex;gap:.5rem;align-items:center}
.testi__dot{
  width:8px;height:8px;border-radius:50%;
  background:var(--wood-pale);transition:var(--t);cursor:pointer
}
.testi__dot.active{background:var(--wood);width:24px;border-radius:4px}

/* â”€â”€ FAQ â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.faq__inner{max-width:760px;margin:0 auto}
.faq-item{border-bottom:1px solid var(--br)}
.faq-item:first-child{border-top:1px solid var(--br)}

.faq-item__btn{
  width:100%;background:none;border:none;
  display:flex;align-items:center;justify-content:space-between;
  gap:1rem;padding:1.5rem 0;text-align:left;transition:color .3s
}
.faq-item__q{
  font-family:'Playfair Display',serif;font-size:1.05rem;
  font-weight:600;color:var(--charcoal);flex:1;transition:color .3s
}
.faq-item__btn:hover .faq-item__q,.faq-item.open .faq-item__q{color:var(--wood-d)}

.faq-item__icon{
  width:30px;height:30px;background:var(--lt-grey);
  border-radius:50%;display:flex;align-items:center;justify-content:center;
  flex-shrink:0;color:var(--dk-grey);transition:var(--t)
}
.faq-item.open .faq-item__icon{
  background:var(--wood);color:var(--white);transform:rotate(45deg)
}
.faq-item__icon svg{width:14px;height:14px}

.faq-item__body{
  display:grid;grid-template-rows:0fr;transition:grid-template-rows .38s var(--ease)
}
.faq-item.open .faq-item__body{grid-template-rows:1fr}
.faq-item__body-inner{overflow:hidden}
.faq-item__a{
  font-size:.925rem;line-height:1.8;color:var(--dk-grey);padding-bottom:1.5rem
}

/* â”€â”€ CTA BANNER â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.cta-band{
  background:linear-gradient(135deg,var(--wood-d) 0%,var(--charcoal) 100%);
  padding:5.5rem 0;position:relative;overflow:hidden
}
.cta-band::before{
  content:'';position:absolute;top:-60%;right:-15%;
  width:700px;height:700px;border-radius:50%;
  background:radial-gradient(circle,rgba(184,149,120,.25) 0%,transparent 70%);
  pointer-events:none
}
.cta-band::after{
  content:'';position:absolute;bottom:-40%;left:-10%;
  width:400px;height:400px;border-radius:50%;
  background:radial-gradient(circle,rgba(255,255,255,.04) 0%,transparent 70%);
  pointer-events:none
}
.cta-band__inner{
  max-width:var(--mw);margin:0 auto;padding:0 2rem;
  display:grid;grid-template-columns:1fr auto;gap:3rem;
  align-items:center;position:relative;z-index:1
}
.cta-band__title{
  font-size:clamp(1.75rem,3vw,2.5rem);font-weight:700;
  color:var(--white);margin-bottom:.75rem
}
.cta-band__desc{font-size:1rem;color:rgba(255,255,255,.65);line-height:1.7;max-width:520px}
.cta-band__acts{display:flex;gap:1rem;flex-shrink:0;flex-wrap:wrap;justify-content:flex-end}

/* â”€â”€ CONTACT â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.contact__inner{
  display:grid;grid-template-columns:1fr 1fr;gap:5.5rem;align-items:start
}

.contact__info-card{
  display:flex;gap:1rem;margin-bottom:1.75rem;align-items:flex-start
}
.contact__info-icon{
  width:46px;height:46px;background:var(--wood-pale);border-radius:var(--r-md);
  display:flex;align-items:center;justify-content:center;
  color:var(--wood);flex-shrink:0;transition:var(--t)
}
.contact__info-card:hover .contact__info-icon{background:var(--wood);color:var(--white)}
.contact__info-icon svg{width:18px;height:18px}
.contact__info-label{
  font-size:.72rem;font-weight:700;letter-spacing:.1em;
  text-transform:uppercase;color:var(--md-grey);margin-bottom:.2rem
}
.contact__info-val{font-size:.9rem;color:var(--charcoal);font-weight:500;line-height:1.55}

.wa-btn{
  display:inline-flex;align-items:center;gap:.75rem;
  background:#25D366;color:var(--white);font-size:.9rem;font-weight:700;
  padding:.9rem 1.875rem;border-radius:var(--r-sm);
  transition:var(--t);margin:1.75rem 0 2rem
}
.wa-btn:hover{background:#1EB958;transform:translateY(-3px);box-shadow:0 8px 24px rgba(37,211,102,.3)}
.wa-btn svg{width:20px;height:20px}

/* Form */
.cf{
  background:var(--soft);border-radius:var(--r-lg);
  padding:2.5rem;border:1px solid var(--br)
}
.cf__title{
  font-family:'Playfair Display',serif;font-size:1.35rem;
  font-weight:700;color:var(--charcoal);margin-bottom:.4rem
}
.cf__sub{font-size:.875rem;color:var(--md-grey);margin-bottom:1.75rem}
.fg{margin-bottom:1.25rem}
.flabel{
  display:block;font-size:.78rem;font-weight:600;
  color:var(--dk-grey);margin-bottom:.4rem;letter-spacing:.02em
}
.freq{color:var(--wood)}
.finput{
  width:100%;padding:.78rem 1rem;
  font-family:'Inter',sans-serif;font-size:.875rem;
  color:var(--charcoal);background:var(--white);
  border:1.5px solid var(--br);border-radius:var(--r-sm);
  outline:none;transition:border-color .25s ease,box-shadow .25s ease
}
.finput::placeholder{color:var(--md-grey)}
.finput:focus{border-color:var(--wood);box-shadow:0 0 0 3px rgba(184,149,120,.1)}
textarea.finput{min-height:112px;resize:vertical;line-height:1.6}

.fsubmit{
  width:100%;padding:.9rem;background:var(--wood);color:var(--white);
  font-family:'Inter',sans-serif;font-size:.9rem;font-weight:700;
  border:none;border-radius:var(--r-sm);cursor:pointer;
  transition:var(--t);letter-spacing:.02em;
  display:flex;align-items:center;justify-content:center;gap:.5rem;
  position:relative;overflow:hidden
}
.fsubmit::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.15),transparent);
  transform:translateX(-100%);transition:transform .5s ease
}
.fsubmit:hover{background:var(--wood-d);transform:translateY(-2px);box-shadow:var(--sh-wood)}
.fsubmit:hover::after{transform:translateX(100%)}

.alert-ok{
  background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;
  border-radius:var(--r-sm);padding:1rem 1.25rem;
  font-size:.875rem;margin-bottom:1.25rem;
  display:flex;align-items:flex-start;gap:.5rem
}
.alert-ok svg{width:16px;height:16px;flex-shrink:0;margin-top:1px}
.ferr{
  background:#fef2f2;color:#991b1b;border:1px solid #fecaca;
  border-radius:var(--r-sm);padding:.65rem .875rem;
  font-size:.78rem;margin-top:.3rem
}

/* â”€â”€ FOOTER â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
.foot{
  background:var(--charcoal);color:rgba(255,255,255,.7);padding:0
}

/* Top accent bar */
.foot__accent{
  height:4px;
  background:linear-gradient(90deg,var(--wood-d),var(--wood),var(--wood-l))
}

.foot__main{
  max-width:var(--mw);margin:0 auto;padding:5rem 2rem 3.5rem;
  display:grid;grid-template-columns:2fr 1fr 1fr 1.5fr;
  gap:3.5rem;border-bottom:1px solid rgba(255,255,255,.08)
}

.foot__logo{
  font-family:'Playfair Display',serif;font-size:1.4rem;
  font-weight:700;color:var(--white);margin-bottom:1rem;
  display:block;transition:color .3s
}
.foot__logo:hover{color:var(--wood-ll)}
.foot__logo em{font-style:normal;color:var(--wood-l)}
.foot__desc{font-size:.875rem;line-height:1.8;margin-bottom:1.75rem;color:rgba(255,255,255,.55)}

.foot__socials{display:flex;gap:.6rem}
.foot__soc-link{
  width:36px;height:36px;background:rgba(255,255,255,.07);
  border-radius:50%;display:flex;align-items:center;justify-content:center;
  color:rgba(255,255,255,.5);transition:var(--t);border:1px solid rgba(255,255,255,.07)
}
.foot__soc-link:hover{background:var(--wood);color:var(--white);transform:translateY(-3px);border-color:var(--wood)}
.foot__soc-link svg{width:16px;height:16px}

.foot__h{
  font-size:.68rem;font-weight:700;letter-spacing:.15em;
  text-transform:uppercase;color:rgba(255,255,255,.9);margin-bottom:1.375rem
}
.foot__links{display:flex;flex-direction:column;gap:.5rem}
.foot__link{
  font-size:.875rem;color:rgba(255,255,255,.5);transition:color .25s ease;
  display:inline-flex;align-items:center;gap:.35rem
}
.foot__link:hover{color:var(--wood-ll)}
.foot__link::before{
  content:'';width:0;height:1px;background:var(--wood-ll);transition:width .25s ease;flex-shrink:0
}
.foot__link:hover::before{width:12px}

.foot__ci{
  display:flex;gap:.625rem;margin-bottom:.875rem;align-items:flex-start
}
.foot__ci svg{width:15px;height:15px;color:var(--wood-l);flex-shrink:0;margin-top:3px}
.foot__ci span{font-size:.875rem;color:rgba(255,255,255,.5);line-height:1.55}

.foot__bottom{
  max-width:var(--mw);margin:0 auto;padding:1.5rem 2rem;
  display:flex;align-items:center;justify-content:space-between;
  gap:1rem;flex-wrap:wrap
}
.foot__copy{font-size:.78rem;color:rgba(255,255,255,.3)}
.foot__legal{display:flex;gap:1.5rem}
.foot__legal a{font-size:.78rem;color:rgba(255,255,255,.3);transition:color .25s}
.foot__legal a:hover{color:var(--wood-ll)}

/* â”€â”€ BACK TO TOP â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
#btt{
  position:fixed;bottom:2rem;right:2rem;z-index:8000;
  width:46px;height:46px;border-radius:50%;
  background:var(--wood);color:var(--white);
  display:flex;align-items:center;justify-content:center;
  box-shadow:var(--sh-wood);
  opacity:0;transform:translateY(16px) scale(.85);
  transition:opacity .35s ease,transform .35s ease;
  pointer-events:none
}
#btt.visible{opacity:1;transform:translateY(0) scale(1);pointer-events:auto}
#btt:hover{background:var(--wood-d);transform:translateY(-3px) scale(1)}
#btt svg{width:18px;height:18px}

/* â”€â”€ RESPONSIVE â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
@media(max-width:1200px){
  .products__grid{grid-template-columns:repeat(3,1fr)}
}
@media(max-width:1024px){
  .nav__links,.nav__cta{display:none}
  .nav__burger{display:flex}
  .hero__inner{grid-template-columns:1fr;gap:3rem;padding:4rem 2rem 3rem}
  .hero__visual{height:420px}
  .hero__card{right:0}
  .about__inner{grid-template-columns:1fr;gap:3.5rem}
  .about__imgs{max-width:540px;height:460px}
  .about__stat-strip{left:auto;right:0;bottom:auto;top:auto;position:relative;margin-top:1.5rem;width:fit-content}
  .contact__inner{grid-template-columns:1fr;gap:3rem}
  .cta-band__inner{grid-template-columns:1fr}
  .cta-band__acts{justify-content:flex-start}
  .foot__main{grid-template-columns:1fr 1fr;gap:2.5rem}
  .steps__inner{grid-template-columns:repeat(2,1fr)}
  .steps__inner::before{display:none}
  .testi-card{flex:0 0 calc(50% - .75rem)}
  .port__layout{grid-template-columns:1fr 1fr}
  .port__layout > *:first-child{grid-row:span 2}
}
@media(max-width:768px){
  :root{--mw:100%}
  .container{padding:0 1.25rem}
  .s{padding:4.5rem 0}
  .hero{padding-top:70px;min-height:auto}
  .hero__inner{padding:3rem 1.25rem 2.5rem}
  .hero__h1{font-size:1.9rem}
  .hero__visual{height:300px}
  .hero__card,.hero__card2{display:none}
  .products__grid{grid-template-columns:1fr 1fr}
  .port__layout{grid-template-columns:1fr}
  .port__layout > *:first-child{grid-row:span 1}
  .port__layout > .port-card:first-child{aspect-ratio:16/9}
  .testi-card{flex:0 0 100%}
  .about__imgs{height:340px}
  .about__img-sec{display:none}
  .about__deco-rect,.about__deco-rect2{display:none}
  .about__vm{grid-template-columns:1fr}
  .foot__main{grid-template-columns:1fr;gap:2rem;padding-bottom:2rem}
  .foot__bottom{flex-direction:column;align-items:flex-start}
  .hero__cta{flex-direction:column;align-items:flex-start}
  .hero__cta .btn{width:100%;justify-content:center}
}
@media(max-width:480px){
  .s{padding:3.5rem 0}
  .products__grid{grid-template-columns:1fr}
  .cf{padding:1.5rem}
  .hero__stats{gap:1.5rem}
  .strip{display:none}
}
/* ════════════════════════════════════════════════════════
   CATEGORY DETAIL MODAL
   ════════════════════════════════════════════════════════ */

/* Overlay */
.cat-modal-ov{
  position:fixed;inset:0;z-index:9500;
  background:rgba(23,23,23,.55);
  backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);
  display:flex;align-items:flex-start;justify-content:center;
  padding:1.5rem;overflow-y:auto;
  opacity:0;pointer-events:none;
  transition:opacity .3s ease;
}
.cat-modal-ov.open{opacity:1;pointer-events:auto}

/* Panel */
.cat-modal{
  background:var(--white);
  border-radius:24px;
  width:100%;max-width:960px;
  box-shadow:0 32px 80px rgba(0,0,0,.22);
  transform:scale(.96) translateY(16px);
  transition:transform .35s cubic-bezier(.22,.68,0,1.2),opacity .3s ease;
  opacity:0;position:relative;
  overflow:hidden;
  margin:auto;
}
.cat-modal-ov.open .cat-modal{transform:scale(1) translateY(0);opacity:1}

/* Header */
.cmo-header{
  position:relative;height:260px;overflow:hidden;flex-shrink:0;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
}
.cmo-header-img{
  width:100%;height:100%;object-fit:cover;
  transition:transform .5s ease;
}
.cmo-header:hover .cmo-header-img{transform:scale(1.04)}
.cmo-header-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(23,23,23,.65) 0%,rgba(23,23,23,.1) 55%,transparent 100%);
}
.cmo-header-body{
  position:absolute;bottom:0;left:0;right:0;
  padding:1.5rem 2rem;color:var(--white);
}
.cmo-header-tag{
  font-size:.65rem;font-weight:700;letter-spacing:.18em;
  text-transform:uppercase;color:var(--wood-ll);margin-bottom:.4rem;
  display:flex;align-items:center;gap:.5rem;
}
.cmo-header-tag::before{
  content:'';width:20px;height:1px;background:var(--wood-ll);flex-shrink:0;
}
.cmo-header-name{
  font-family:'Playfair Display',serif;
  font-size:clamp(1.4rem,3vw,2rem);font-weight:700;
  margin-bottom:.35rem;line-height:1.2;
}
.cmo-header-desc{
  font-size:.875rem;color:rgba(255,255,255,.75);
  max-width:580px;line-height:1.55;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}

/* Close button */
.cmo-close{
  position:absolute;top:1rem;right:1rem;
  width:38px;height:38px;border-radius:50%;
  background:rgba(255,255,255,.2);backdrop-filter:blur(8px);
  border:1.5px solid rgba(255,255,255,.35);
  color:var(--white);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;transition:all .22s ease;z-index:10;
}
.cmo-close:hover{background:rgba(255,255,255,.35);transform:scale(1.08)}
.cmo-close svg{width:16px;height:16px}

/* Body */
.cmo-body{padding:1.75rem 2rem 2rem}

/* Toolbar: search + sort */
.cmo-toolbar{
  display:flex;align-items:center;gap:.875rem;
  margin-bottom:1.5rem;flex-wrap:wrap;
}
.cmo-search-wrap{
  position:relative;flex:1;min-width:200px;
}
.cmo-search-wrap svg{
  position:absolute;left:.875rem;top:50%;transform:translateY(-50%);
  width:15px;height:15px;color:var(--md-grey);pointer-events:none;
}
.cmo-search{
  width:100%;padding:.65rem .875rem .65rem 2.5rem;
  border:1.5px solid var(--wood-ll);border-radius:50px;
  font-family:'Inter',sans-serif;font-size:.85rem;
  color:var(--charcoal);background:var(--soft);
  outline:none;transition:border-color .22s ease,box-shadow .22s ease;
}
.cmo-search:focus{
  border-color:var(--wood);
  box-shadow:0 0 0 3px rgba(184,149,120,.15);
  background:var(--white);
}
.cmo-sort{
  padding:.65rem 1.125rem .65rem .875rem;
  border:1.5px solid var(--wood-ll);border-radius:50px;
  font-family:'Inter',sans-serif;font-size:.82rem;
  color:var(--dk-grey);background:var(--soft);
  outline:none;cursor:pointer;
  transition:border-color .22s ease;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23A6A09A' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right .75rem center;
  padding-right:2.25rem;
  -webkit-appearance:none;appearance:none;
}
.cmo-sort:focus{border-color:var(--wood)}

.cmo-count{
  font-size:.8rem;color:var(--md-grey);white-space:nowrap;
  display:flex;align-items:center;gap:.35rem;
}
.cmo-count strong{color:var(--charcoal)}

/* Products grid */
.cmo-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:1.125rem;
}

/* Product card inside modal */
.cmo-card{
  background:var(--white);border-radius:14px;
  border:1px solid var(--wood-pale);
  overflow:hidden;transition:all .28s ease;
  display:flex;flex-direction:column;
}
.cmo-card:hover{
  transform:translateY(-5px);
  box-shadow:0 12px 36px rgba(184,149,120,.2);
  border-color:var(--wood-ll);
}

.cmo-card__img{
  position:relative;aspect-ratio:4/3;overflow:hidden;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
  flex-shrink:0;
}
.cmo-card__img img{
  width:100%;height:100%;object-fit:cover;
  transition:transform .45s ease;
}
.cmo-card:hover .cmo-card__img img{transform:scale(1.07)}

.cmo-card__badge{
  position:absolute;top:.625rem;left:.625rem;
  background:var(--wood);color:var(--white);
  font-size:.62rem;font-weight:700;letter-spacing:.06em;
  padding:.22rem .55rem;border-radius:4px;text-transform:uppercase;
}
.cmo-card__avail{
  position:absolute;top:.625rem;right:.625rem;
  width:8px;height:8px;border-radius:50%;
  box-shadow:0 0 0 2px var(--white);
}
.cmo-card__avail.yes{background:#4caf50}
.cmo-card__avail.no {background:#ef5350}

.cmo-card__ph{
  width:100%;height:100%;
  display:flex;align-items:center;justify-content:center;
}
.cmo-card__ph svg{width:36px;height:36px;color:var(--wood-ll);opacity:.6}

.cmo-card__body{
  padding:1rem 1.125rem .625rem;flex:1;
}
.cmo-card__name{
  font-family:'Playfair Display',serif;
  font-size:.95rem;font-weight:600;color:var(--charcoal);
  margin-bottom:.35rem;line-height:1.3;
}
.cmo-card__desc{
  font-size:.78rem;color:var(--md-grey);line-height:1.55;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
  margin-bottom:.5rem;
}
.cmo-card__specs{
  display:flex;flex-wrap:wrap;gap:.35rem;margin-bottom:.5rem;
}
.cmo-card__spec{
  font-size:.7rem;background:var(--wood-pale);color:var(--dk-grey);
  padding:.18rem .55rem;border-radius:20px;
  display:flex;align-items:center;gap:.25rem;
}
.cmo-card__spec svg{width:10px;height:10px;color:var(--wood);flex-shrink:0}

.cmo-card__foot{
  padding:.625rem 1.125rem 1rem;border-top:1px solid var(--wood-pale);
  display:flex;align-items:center;justify-content:space-between;gap:.5rem;
}
.cmo-card__price{
  font-family:'Playfair Display',serif;
  font-size:1rem;font-weight:700;color:var(--wood-d);line-height:1;
}
.cmo-card__price-na{font-size:.8rem;color:var(--md-grey)}

.cmo-card__wa{
  display:inline-flex;align-items:center;gap:.35rem;
  background:#25D366;color:var(--white);
  font-size:.72rem;font-weight:700;
  padding:.42rem .875rem;border-radius:50px;
  transition:all .22s ease;white-space:nowrap;
  text-decoration:none;
}
.cmo-card__wa:hover{background:#1EB958;transform:translateY(-1px)}
.cmo-card__wa svg{width:13px;height:13px}

/* Empty state inside modal */
.cmo-empty{
  padding:3rem 1.5rem;text-align:center;
}
.cmo-empty-ico{
  width:56px;height:56px;border-radius:16px;
  background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey));
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 1rem;color:var(--wood-ll);
}
.cmo-empty-ico svg{width:26px;height:26px}
.cmo-empty-t{font-size:.95rem;font-weight:700;color:var(--charcoal);margin-bottom:.35rem}
.cmo-empty-s{font-size:.82rem;color:var(--md-grey);max-width:280px;margin:0 auto}

/* Footer CTA */
.cmo-footer{
  padding:1.375rem 2rem;
  border-top:1px solid var(--wood-pale);
  background:linear-gradient(90deg,var(--wood-xs),var(--soft));
  display:flex;align-items:center;justify-content:space-between;
  flex-wrap:wrap;gap:1rem;
}
.cmo-footer-text{
  font-size:.84rem;color:var(--dk-grey);line-height:1.55;
}
.cmo-footer-text strong{color:var(--charcoal);font-weight:700}
.cmo-footer-acts{display:flex;gap:.75rem;flex-wrap:wrap}

.cmo-btn-consult{
  display:inline-flex;align-items:center;gap:.45rem;
  background:linear-gradient(135deg,var(--wood),var(--wood-d));
  color:var(--white);font-family:'Inter',sans-serif;font-size:.84rem;
  font-weight:600;padding:.72rem 1.5rem;border-radius:8px;
  transition:all .25s ease;text-decoration:none;
}
.cmo-btn-consult:hover{
  background:linear-gradient(135deg,var(--wood-d),#7A6050);
  transform:translateY(-2px);box-shadow:0 6px 20px rgba(184,149,120,.3);
}
.cmo-btn-consult svg{width:15px;height:15px}

.cmo-btn-wa{
  display:inline-flex;align-items:center;gap:.45rem;
  background:#25D366;color:var(--white);
  font-family:'Inter',sans-serif;font-size:.84rem;font-weight:600;
  padding:.72rem 1.5rem;border-radius:8px;
  transition:all .25s ease;text-decoration:none;
}
.cmo-btn-wa:hover{background:#1EB958;transform:translateY(-2px);box-shadow:0 6px 20px rgba(37,211,102,.3)}
.cmo-btn-wa svg{width:15px;height:15px}

/* Loading skeleton */
.cmo-skeleton{
  display:grid;grid-template-columns:repeat(3,1fr);gap:1.125rem;
}
.cmo-skel-card{
  border-radius:14px;overflow:hidden;border:1px solid var(--wood-pale);
}
.cmo-skel-img{height:160px;background:linear-gradient(90deg,var(--lt-grey) 25%,var(--wood-xs) 50%,var(--lt-grey) 75%);background-size:200% 100%;animation:shimmer 1.4s infinite}
.cmo-skel-body{padding:1rem}
.cmo-skel-line{height:12px;border-radius:6px;background:linear-gradient(90deg,var(--lt-grey) 25%,var(--wood-xs) 50%,var(--lt-grey) 75%);background-size:200% 100%;animation:shimmer 1.4s infinite;margin-bottom:.625rem}
.cmo-skel-line.short{width:60%}
.cmo-skel-line.xshort{width:40%}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}

/* Responsive */
@media(max-width:768px){
  .cat-modal-ov{padding:.75rem;align-items:flex-start}
  .cmo-header{height:200px}
  .cmo-header-body{padding:1.125rem 1.25rem}
  .cmo-header-name{font-size:1.35rem}
  .cmo-body{padding:1.25rem 1.25rem 1.5rem}
  .cmo-grid{grid-template-columns:repeat(2,1fr);gap:.875rem}
  .cmo-footer{padding:1.125rem 1.25rem}
}
@media(max-width:480px){
  .cat-modal-ov{padding:.5rem}
  .cat-modal{border-radius:16px}
  .cmo-grid{grid-template-columns:1fr}
  .cmo-toolbar{flex-direction:column;align-items:stretch}
  .cmo-search-wrap{min-width:auto}
  .cmo-footer-acts{flex-direction:column}
  .cmo-btn-consult,.cmo-btn-wa{justify-content:center}
}

/* ════════════════════════════════════════════════════════
   PRODUCT DETAIL MODAL (layered above category modal)
   ════════════════════════════════════════════════════════ */

.pd-overlay{
  position:fixed;inset:0;z-index:9600;
  background:rgba(23,23,23,.6);
  backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
  display:flex;align-items:flex-start;justify-content:center;
  padding:1.5rem;overflow-y:auto;
  opacity:0;pointer-events:none;
  transition:opacity .3s ease;
}
.pd-overlay.open{opacity:1;pointer-events:auto}

.pd-modal{
  background:var(--white);
  border-radius:20px;
  width:100%;max-width:880px;
  box-shadow:0 32px 80px rgba(0,0,0,.25);
  transform:scale(.96) translateY(16px);
  transition:transform .35s cubic-bezier(.22,.68,0,1.2),opacity .3s ease;
  opacity:0;position:relative;overflow:hidden;
  margin:auto;
}
.pd-overlay.open .pd-modal{transform:scale(1) translateY(0);opacity:1}

/* Layout: image left, info right */
.pd-inner{display:grid;grid-template-columns:1fr 1fr;min-height:480px}

/* Gallery side */
.pd-gallery{position:relative;background:linear-gradient(135deg,var(--wood-pale),var(--lt-grey))}
.pd-main-img{
  width:100%;height:100%;min-height:400px;object-fit:cover;
  transition:opacity .3s ease;
}
.pd-thumbs{
  position:absolute;bottom:1rem;left:1rem;right:1rem;
  display:flex;gap:.5rem;justify-content:center;flex-wrap:wrap;
}
.pd-thumb{
  width:56px;height:56px;border-radius:8px;overflow:hidden;
  border:2px solid rgba(255,255,255,.6);cursor:pointer;
  transition:border-color .2s ease,transform .2s ease;
  flex-shrink:0;background:var(--white);
}
.pd-thumb:hover{transform:scale(1.08)}
.pd-thumb.active{border-color:var(--wood);transform:scale(1.08)}
.pd-thumb img{width:100%;height:100%;object-fit:cover}

/* Info side */
.pd-info{padding:2rem 2.25rem;display:flex;flex-direction:column;overflow-y:auto;max-height:85vh}
.pd-close{
  position:absolute;top:.875rem;right:.875rem;
  width:36px;height:36px;border-radius:50%;
  background:rgba(255,255,255,.9);border:1.5px solid var(--brd);
  color:var(--dk-grey);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;transition:all .22s ease;z-index:10;
}
.pd-close:hover{background:var(--wood);color:var(--white);border-color:var(--wood)}
.pd-close svg{width:15px;height:15px}

.pd-cat{
  font-size:.68rem;font-weight:700;letter-spacing:.15em;
  text-transform:uppercase;color:var(--wood);margin-bottom:.5rem;
  display:flex;align-items:center;gap:.5rem;
}
.pd-cat::before{content:'';width:20px;height:1px;background:var(--wood)}

.pd-name{
  font-family:'Playfair Display',serif;
  font-size:1.6rem;font-weight:700;color:var(--charcoal);
  margin-bottom:.5rem;line-height:1.25;
}
.pd-badge-row{display:flex;gap:.375rem;flex-wrap:wrap;margin-bottom:.875rem}
.pd-badge{
  font-size:.62rem;font-weight:700;letter-spacing:.05em;
  padding:.2rem .55rem;border-radius:4px;text-transform:uppercase;
}
.pd-badge-wood{background:var(--wood);color:var(--white)}
.pd-badge-avail{background:#e8f5e9;color:#2e7d32}
.pd-badge-soldout{background:var(--lt-grey);color:var(--md-grey)}

.pd-price{
  font-family:'Playfair Display',serif;
  font-size:1.5rem;font-weight:700;color:var(--wood-d);
  margin-bottom:1rem;line-height:1;
}
.pd-price-na{font-size:.9rem;color:var(--md-grey);font-weight:500}

.pd-desc{
  font-size:.875rem;color:var(--dk-grey);line-height:1.75;
  margin-bottom:1.25rem;
}

/* Specs */
.pd-specs{margin-bottom:1.25rem}
.pd-specs-title{
  font-size:.68rem;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:var(--wood);margin-bottom:.625rem;
}
.pd-spec-grid{display:grid;grid-template-columns:1fr 1fr;gap:.5rem}
.pd-spec{
  display:flex;align-items:center;gap:.5rem;
  font-size:.8rem;color:var(--dk-grey);
  padding:.5rem .75rem;background:var(--wood-xs);
  border-radius:8px;border:1px solid var(--brd);
}
.pd-spec svg{width:14px;height:14px;color:var(--wood);flex-shrink:0}

/* Materials */
.pd-materials{margin-bottom:1.25rem}
.pd-materials-list{display:flex;flex-direction:column;gap:.5rem}
.pd-material{
  display:flex;align-items:flex-start;gap:.625rem;
  padding:.625rem .875rem;background:var(--wood-xs);
  border-radius:8px;border-left:3px solid var(--wood-ll);
}
.pd-material-ico{
  width:28px;height:28px;border-radius:6px;flex-shrink:0;
  background:var(--wood-pale);color:var(--wood-d);
  display:flex;align-items:center;justify-content:center;
}
.pd-material-ico svg{width:14px;height:14px}
.pd-material-info{flex:1;min-width:0}
.pd-material-name{font-size:.8rem;font-weight:600;color:var(--charcoal)}
.pd-material-desc{font-size:.73rem;color:var(--md-grey);line-height:1.5}
.pd-material-spec{font-size:.7rem;color:var(--wood-d);font-style:italic}

/* CTA buttons */
.pd-cta{margin-top:auto;display:flex;flex-direction:column;gap:.625rem;padding-top:1rem;border-top:1px solid var(--brd)}
.pd-cta-row{display:flex;gap:.625rem;flex-wrap:wrap}
.pd-btn-shopee{
  display:inline-flex;align-items:center;justify-content:center;gap:.5rem;
  background:#ee4d2d;color:var(--white);
  font-family:'Inter',sans-serif;font-size:.85rem;font-weight:700;
  padding:.72rem 1.5rem;border-radius:10px;
  transition:all .25s ease;text-decoration:none;flex:1;
}
.pd-btn-shopee:hover{background:#d04423;transform:translateY(-2px);box-shadow:0 6px 20px rgba(238,77,45,.3)}
.pd-btn-shopee svg{width:16px;height:16px}

.pd-btn-wa{
  display:inline-flex;align-items:center;justify-content:center;gap:.5rem;
  background:#25D366;color:var(--white);
  font-family:'Inter',sans-serif;font-size:.85rem;font-weight:700;
  padding:.72rem 1.5rem;border-radius:10px;
  transition:all .25s ease;text-decoration:none;flex:1;
}
.pd-btn-wa:hover{background:#1EB958;transform:translateY(-2px);box-shadow:0 6px 20px rgba(37,211,102,.3)}
.pd-btn-wa svg{width:16px;height:16px}

.pd-shopee-info{
  font-size:.73rem;color:var(--md-grey);
  display:flex;align-items:center;gap:.3rem;
  margin-top:.25rem;
}

/* Responsive */
@media(max-width:768px){
  .pd-overlay{padding:.5rem}
  .pd-modal{border-radius:14px}
  .pd-inner{grid-template-columns:1fr}
  .pd-main-img{min-height:280px}
  .pd-info{padding:1.25rem;max-height:none}
  .pd-spec-grid{grid-template-columns:1fr}
  .pd-name{font-size:1.35rem}
}
</style>
</head>
<body>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     NAVBAR
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<nav class="nav" id="navbar" role="navigation" aria-label="Navigasi utama">
  <div class="nav__inner">
    <a href="{{ route('home') }}" class="nav__logo" aria-label="ALL FURNITURE"><em>ALL</em> FURNITURE</a>

    <ul class="nav__links" role="list">
      <li><a href="#produk"    class="nav__link">Produk</a></li>
      <li><a href="#kategori"  class="nav__link">Kategori</a></li>
      <li><a href="#tentang"   class="nav__link">Tentang</a></li>
      <li><a href="#keunggulan" class="nav__link">Keunggulan</a></li>
      <li><a href="#testimoni" class="nav__link">Testimoni</a></li>
      <li><a href="#kontak"    class="nav__link">Kontak</a></li>
    </ul>

    <div class="nav__cta">
      <a href="#kontak" class="btn btn-outline">Konsultasi Gratis</a>
      <a href="https://wa.me/{{ $settings->get('contact_whatsapp')?->value ?? '6281234567890' }}" target="_blank" rel="noopener" class="btn btn-primary">
        <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        WhatsApp
      </a>
    </div>

    <button class="nav__burger" id="burgerBtn" aria-label="Buka menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

{{-- Mobile Drawer --}}
<div class="drawer" id="drawer" role="dialog" aria-modal="true" aria-label="Menu">
  <div class="drawer__bg" id="drawerBg"></div>
  <div class="drawer__panel">
    <div class="drawer__head">
      <span class="nav__logo"><em>ALL</em> FURNITURE</span>
      <button class="drawer__close" id="drawerClose" aria-label="Tutup">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
      </button>
    </div>
    <nav class="drawer__nav">
      <a href="#produk">Produk Unggulan</a>
      <a href="#kategori">Kategori Furniture</a>
      <a href="#tentang">Tentang Kami</a>
      <a href="#keunggulan">Keunggulan</a>
      <a href="#testimoni">Testimoni</a>
      <a href="#kontak">Kontak</a>
    </nav>
    <div class="drawer__foot">
      <a href="#kontak" class="btn btn-outline">Konsultasi Gratis</a>
      <a href="https://wa.me/{{ $settings->get('contact_whatsapp')?->value ?? '6281234567890' }}" target="_blank" class="btn btn-primary">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        Hubungi via WhatsApp
      </a>
    </div>
  </div>
</div>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     HERO SECTION
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@php
  $heroH   = $settings->get('hero_headline')?->value   ?? 'Furniture Premium untuk Rumah & Ruang Belajar';
  $heroSub = $settings->get('hero_subheadline')?->value ?? 'Menciptakan ruang yang nyaman, fungsional, dan estetis dengan furniture berkualitas tinggi yang dirancang khusus untuk kebutuhan Anda.';
  $cta1T   = $settings->get('hero_cta_primary_text')?->value   ?? 'Jelajahi Koleksi';
  $cta1L   = $settings->get('hero_cta_primary_link')?->value   ?? '#produk';
  $cta2T   = $settings->get('hero_cta_secondary_text')?->value ?? 'Konsultasi Gratis';
  $cta2L   = $settings->get('hero_cta_secondary_link')?->value ?? '#kontak';
  $heroImg = $settings->get('hero_image_desktop')?->value;
  $heroImgAcc = $settings->get('hero_image_mobile')?->value;
  $s1v = $settings->get('stat_1_value')?->value ?? '500+';
  $s1l = $settings->get('stat_1_label')?->value ?? 'Proyek Selesai';
  $s2v = $settings->get('stat_2_value')?->value ?? '1.000+';
  $s2l = $settings->get('stat_2_label')?->value ?? 'Pelanggan Puas';
  $s3v = $settings->get('stat_3_value')?->value ?? '15+';
  $s3l = $settings->get('stat_3_label')?->value ?? 'Tahun Pengalaman';
@endphp

<section class="hero" id="beranda" aria-label="Halaman utama">
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__circle" aria-hidden="true"></div>

  <div class="hero__inner">
    {{-- â”€â”€ Left: Content â”€â”€ --}}
    <div>
      <div class="hero__kicker anim anim-up">
        <span class="hero__kicker-dot" aria-hidden="true"></span>
        <span class="hero__kicker-line" aria-hidden="true"></span>
        <span class="hero__kicker-text">Premium Furniture Collection</span>
      </div>

      <h1 class="hero__h1 anim anim-up d1">
        @php
          $heroWords = explode(' ', $heroH);
          $half = ceil(count($heroWords) / 2);
          $line1 = implode(' ', array_slice($heroWords, 0, $half));
          $line2 = implode(' ', array_slice($heroWords, $half));
        @endphp
        {{ $line1 }}<br>
        <em>{{ $line2 }}</em>
      </h1>

      <p class="hero__desc anim anim-up d2">{{ $heroSub }}</p>

      <div class="hero__cta anim anim-up d3">
        <a href="{{ $cta1L }}" class="btn btn-primary">
          {{ $cta1T }}
          <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ $cta2L }}" class="btn btn-outline">{{ $cta2T }}</a>
      </div>

      <div class="hero__stats anim anim-up d4">
        <div>
          <span class="hero__stat-num" data-count="{{ preg_replace('/[^0-9]/','',$s1v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s1v) }}">{{ $s1v }}</span>
          <span class="hero__stat-label">{{ $s1l }}</span>
        </div>
        <div>
          <span class="hero__stat-num" data-count="{{ preg_replace('/[^0-9]/','',$s2v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s2v) }}">{{ $s2v }}</span>
          <span class="hero__stat-label">{{ $s2l }}</span>
        </div>
        <div>
          <span class="hero__stat-num" data-count="{{ preg_replace('/[^0-9]/','',$s3v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s3v) }}">{{ $s3v }}</span>
          <span class="hero__stat-label">{{ $s3l }}</span>
        </div>
      </div>
    </div>

    {{-- â”€â”€ Right: Layered Visual â”€â”€ --}}
    <div class="hero__visual anim anim-right d2" id="heroVisual">
      {{-- Decorative geometric elements --}}
      <div class="hero__deco-frame" aria-hidden="true"></div>
      <div class="hero__deco-line"  aria-hidden="true"></div>
      {{-- Dot grid SVG --}}
      <svg class="hero__deco-dot-grid" aria-hidden="true" viewBox="0 0 80 80" fill="none">
        @for($r=0;$r<5;$r++) @for($c=0;$c<5;$c++)
          <circle cx="{{ 8+$c*16 }}" cy="{{ 8+$r*16 }}" r="1.5" fill="#B89578" opacity=".45"/>
        @endfor @endfor
      </svg>

      {{-- Main image --}}
      <div class="hero__img-main">
        @if($heroImg)
          <img src="{{ asset('storage/'.$heroImg) }}" alt="Interior premium ALL FURNITURE" loading="eager" fetchpriority="high"
               onerror="this.src='https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=900&q=85&auto=format&fit=crop'">
        @else
          <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=900&q=85&auto=format&fit=crop"
               alt="Premium furniture showroom" loading="eager" fetchpriority="high">
        @endif
      </div>

      {{-- Accent / secondary image (overlapping bottom-left) --}}
      <div class="hero__img-accent">
        @if($heroImgAcc)
          <img src="{{ asset('storage/'.$heroImgAcc) }}" alt="Detail furniture ALL FURNITURE" loading="lazy">
        @else
          <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=500&q=80&auto=format&fit=crop"
               alt="Detail furniture" loading="lazy">
        @endif
      </div>

      {{-- Floating card 1 â€” quality badge --}}
      <div class="hero__card" aria-hidden="true">
        <div class="hero__card-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
        </div>
        <div>
          <strong class="hero__card-strong">Kualitas Terjamin</strong>
          <span class="hero__card-sub">Material premium &amp; garansi</span>
        </div>
      </div>

      {{-- Floating card 2 â€” custom badge --}}
      <div class="hero__card2" aria-hidden="true">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        <div>
          <span class="hero__card2-text">Custom Design</span>
          <span class="hero__card2-sub">Sesuai kebutuhan Anda</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     MARQUEE STRIP
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<div class="strip" aria-hidden="true">
  <div class="strip__track">
    @php $items = ['Furniture Premium','Custom Design','Kualitas Terjamin','Kirim Seluruh Indonesia','Konsultasi Gratis','Pasang Profesional','Material Pilihan','15+ Tahun Pengalaman','500+ Proyek Selesai','Garansi Produk']; @endphp
    @foreach(array_merge($items,$items) as $item)
      <span class="strip__item"><span class="strip__dot"></span>{{ $item }}</span>
    @endforeach
  </div>
</div>


{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     CATEGORIES â€” editorial asymmetric grid
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<section class="s s-soft cats-section" id="kategori" aria-labelledby="cat-title">
  <div class="cats-deco-1" aria-hidden="true"></div>
  <div class="cats-deco-2" aria-hidden="true"></div>
  <div class="container">
    <div class="sh sh--c">
      <div class="sh__eyebrow anim anim-up">Kategori Produk</div>
      <h2 class="sh__title anim anim-up d1" id="cat-title">Temukan Furniture yang Tepat</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Klik kategori untuk melihat koleksi lengkap produk &mdash; dari ruang tamu hingga ruang kelas</p>
    </div>

    @if($categories->isNotEmpty())
    <script>window._catProductsBase = '{{ url('/categories') }}';</script>

    <div class="cats-wrap">
      <button class="cats-nav cats-nav--prev" id="catsPrev" aria-label="Sebelumnya" disabled>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <div class="cats-track" id="catsTrack">
        @php
          $catFallbacks = [
            'furniture-ruang-tamu'        => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=700&q=80&auto=format&fit=crop',
            'furniture-kamar-tidur'       => 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=700&q=80&auto=format&fit=crop',
            'furniture-ruang-makan'       => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=700&q=80&auto=format&fit=crop',
            'meja-dan-kursi-sekolah'      => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=700&q=80&auto=format&fit=crop',
            'meja-guru-dan-furniture-guru'=> 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=700&q=80&auto=format&fit=crop',
            'lemari-dan-rak-penyimpanan'  => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=700&q=80&auto=format&fit=crop',
            'furniture-kantor'            => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80&auto=format&fit=crop',
            'furniture-custom'            => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?w=700&q=80&auto=format&fit=crop',
          ];
        @endphp

        @foreach($categories as $i => $cat)
          @php
            $fb = $catFallbacks[$cat->slug] ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=700&q=80&auto=format&fit=crop';
            $cardClass = $i === 0 ? 'cat-card cat-card--featured' : 'cat-card cat-card--regular';
          @endphp
          <button type="button"
            class="{{ $cardClass }} anim anim-up d{{ min($i+1,8) }}"
            data-slug="{{ $cat->slug }}"
            data-name="{{ e($cat->name) }}"
            data-desc="{{ e($cat->description ?? '') }}"
            data-img="{{ $cat->image_path ? asset('storage/'.$cat->image_path) : $fb }}"
            aria-label="Lihat produk kategori {{ $cat->name }}">
            <div class="cat-card__img-wrap">
              @if($cat->image_path)
                <img class="cat-card__img" src="{{ asset('storage/'.$cat->image_path) }}" alt="{{ $cat->name }}" loading="lazy" onerror="this.src='{{ $fb }}'">
              @else
                <img class="cat-card__img" src="{{ $fb }}" alt="{{ $cat->name }}" loading="lazy">
              @endif
            </div>
            <div class="cat-card__overlay" aria-hidden="true"></div>
            <div class="cat-card__body">
              <div class="cat-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
              </div>
              <p class="cat-card__tag">Kategori</p>
              <p class="cat-card__name">{{ $cat->name }}</p>
              @if($cat->description)
                <p class="cat-card__desc">{{ $cat->description }}</p>
              @endif
              <span class="cat-card__arrow">
                Lihat Koleksi
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </div>
          </button>
        @endforeach
      </div>
      <button class="cats-nav cats-nav--next" id="catsNext" aria-label="Berikutnya">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
      </button>
    </div>

    <div class="cats-controls">
      <div class="cats-dots" id="catsDots"></div>
      <button class="cats-all-btn" id="catsAllBtn">
        Lihat Semua Kategori
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:14px;height:14px"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </div>
    @else
      <p style="text-align:center;color:var(--md-grey);padding:3rem 0">Kategori belum tersedia.</p>
    @endif
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     PRODUCTS â€” premium interactive cards
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<section class="s s-white" id="produk" aria-labelledby="prod-title">
  <div class="container">
    <div class="sh">
      <div class="sh__eyebrow anim anim-up">Produk Unggulan</div>
      <h2 class="sh__title anim anim-up d1" id="prod-title">Katalog Premium Kami</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Setiap piece dirancang dengan perhatian detail â€” dari pemilihan material hingga finishing akhir</p>
    </div>

    @if($featuredProducts->isNotEmpty())
    @php
      $pFallbacks = [
        'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1551298370-9d3d53740c72?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1618220179428-22790b461013?w=600&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=600&q=80&auto=format&fit=crop',
      ];
    @endphp
    <div class="products__grid">
      @foreach($featuredProducts as $i => $p)
        @php $img = $p->primaryImage?->image_path; $fb = $pFallbacks[$i % count($pFallbacks)]; @endphp
        <article class="prod-card anim anim-up d{{ min($i+1,8) }}">
          <div class="prod-card__img-wrap">
            @if($img)
              <img class="prod-card__img" src="{{ asset('storage/'.$img) }}" alt="{{ $p->name }}" loading="lazy" onerror="this.src='{{ $fb }}'">
            @else
              <img class="prod-card__img" src="{{ $fb }}" alt="{{ $p->name }}" loading="lazy">
            @endif

            {{-- Hover overlay with quick action --}}
            <div class="prod-card__ov" aria-hidden="true">
              <button class="prod-card__ov-btn" onclick="document.getElementById('kontak').scrollIntoView({behavior:'smooth'})">Konsultasi â†’</button>
            </div>

            @if($p->badge)
              <div class="prod-card__badge"><span class="badge badge-wood">{{ $p->badge }}</span></div>
            @elseif($p->is_featured)
              <div class="prod-card__badge"><span class="badge badge-dark">Unggulan</span></div>
            @endif
          </div>

          <div class="prod-card__body">
            @if($p->category) <p class="prod-card__cat">{{ $p->category->name }}</p> @endif
            <h3 class="prod-card__name">{{ $p->name }}</h3>
            @if($p->price || $p->price_label)
              <p class="prod-card__price">{{ $p->formatted_price }}</p>
            @endif
          </div>
          <div class="prod-card__foot">
            <a href="#kontak" class="btn btn-outline">
              Lihat Detail
              <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </article>
      @endforeach
    </div>

    <div style="text-align:center;margin-top:3.5rem" class="anim anim-up">
      <a href="#kontak" class="btn btn-outline">
        Lihat Semua Produk
        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
    @else
      <p style="text-align:center;color:var(--md-grey);padding:3rem 0">Produk unggulan belum tersedia.</p>
    @endif
  </div>
</section>


{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     ABOUT â€” editorial asymmetric, overlapping images
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@php
  $aboutTitle   = $settings->get('about_title')?->value   ?? 'Tentang ALL FURNITURE';
  $aboutStory   = $settings->get('about_story')?->value   ?? 'ALL FURNITURE didirikan dengan visi menyediakan furniture berkualitas tinggi yang mengutamakan kenyamanan, fungsionalitas, dan estetika untuk rumah, sekolah, dan kantor.';
  $aboutVision  = $settings->get('about_vision')?->value  ?? 'Menjadi penyedia furniture terpercaya nomor satu di Indonesia.';
  $aboutMission = $settings->get('about_mission')?->value ?? 'Memberikan solusi furniture berkualitas dengan desain fungsional, material terbaik, dan layanan prima.';
  $aboutImg     = $settings->get('about_image')?->value;
  $s4v = $settings->get('stat_4_value')?->value ?? '200+';
  $s4l = $settings->get('stat_4_label')?->value ?? 'Produk Tersedia';
@endphp

<section class="s s-wood-xs s-textured" id="tentang" aria-labelledby="about-title">
  <div class="container">
    <div class="about__inner">

      {{-- â”€â”€ Image stack (left) â”€â”€ --}}
      <div class="about__imgs anim anim-left">
        {{-- Decorative elements --}}
        <div class="about__deco-rect"  aria-hidden="true"></div>
        <div class="about__deco-rect2" aria-hidden="true"></div>

        {{-- Main image --}}
        <div class="about__img-main">
          @if($aboutImg)
            <img src="{{ asset('storage/'.$aboutImg) }}" alt="Workshop ALL FURNITURE" loading="lazy"
                 style="width:100%;height:100%;object-fit:cover"
                 onerror="this.src='https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=800&q=80&auto=format&fit=crop'">
          @else
            <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=800&q=80&auto=format&fit=crop"
                 alt="Workshop ALL FURNITURE" loading="lazy" style="width:100%;height:100%;object-fit:cover">
          @endif
        </div>

        {{-- Secondary / accent image --}}
        <div class="about__img-sec">
          <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=500&q=80&auto=format&fit=crop"
               alt="Detail produk ALL FURNITURE" loading="lazy" style="width:100%;height:100%;object-fit:cover">
        </div>

        {{-- Floating stat strip --}}
        <div class="about__stat-strip" aria-label="Statistik perusahaan">
          <div>
            <span class="about__snum" data-count="{{ preg_replace('/[^0-9]/','', $s1v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s1v) }}">{{ $s1v }}</span>
            <span class="about__slabel">{{ $s1l }}</span>
          </div>
          <div>
            <span class="about__snum" data-count="{{ preg_replace('/[^0-9]/','', $s2v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s2v) }}">{{ $s2v }}</span>
            <span class="about__slabel">{{ $s2l }}</span>
          </div>
          <div>
            <span class="about__snum" data-count="{{ preg_replace('/[^0-9]/','', $s3v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s3v) }}">{{ $s3v }}</span>
            <span class="about__slabel">{{ $s3l }}</span>
          </div>
          <div>
            <span class="about__snum" data-count="{{ preg_replace('/[^0-9]/','', $s4v) }}" data-suffix="{{ preg_replace('/[0-9]/','', $s4v) }}">{{ $s4v }}</span>
            <span class="about__slabel">{{ $s4l }}</span>
          </div>
        </div>
      </div>

      {{-- â”€â”€ Content (right) â”€â”€ --}}
      <div class="anim anim-right">
        <div class="sh__eyebrow">Tentang Kami</div>
        <h2 class="sh__title" id="about-title">{{ $aboutTitle }}</h2>
        <div class="sh__line"></div>
        <p class="about__desc">{{ $aboutStory }}</p>

        <div class="about__vm">
          <div class="about__vm-item">
            <p class="about__vm-tag">Visi</p>
            <p class="about__vm-text">{{ $aboutVision }}</p>
          </div>
          <div class="about__vm-item">
            <p class="about__vm-tag">Misi</p>
            <p class="about__vm-text">{{ $aboutMission }}</p>
          </div>
        </div>

        <a href="#kontak" class="btn btn-primary">
          Konsultasi dengan Kami
          <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     FEATURES (KEUNGGULAN)
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<section class="s s-white" id="keunggulan" aria-labelledby="feat-title">
  <div class="container">
    <div class="sh sh--c">
      <div class="sh__eyebrow anim anim-up">Keunggulan Kami</div>
      <h2 class="sh__title anim anim-up d1" id="feat-title">Mengapa Memilih ALL FURNITURE?</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Kepercayaan ribuan pelanggan dibangun di atas komitmen kami terhadap kualitas dan layanan</p>
    </div>

    @if($features->isNotEmpty())
    @php
      $iconSvgs = [
        'truck-moving'  => '<path d="M1 3h15v13H1z"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
        'palette'       => '<circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 011.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>',
        'headphones'    => '<path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"/>',
        'shield-check'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/>',
        'handshake'     => '<path d="M20.42 4.58a5.4 5.4 0 00-7.65 0l-.77.78-.77-.78a5.4 5.4 0 00-7.65 7.65l8.19 8.19a.5.5 0 00.7 0l8.19-8.19a5.4 5.4 0 000-7.65z"/>',
        'pallet'        => '<rect x="2" y="14" width="20" height="5" rx="1"/><rect x="5" y="11" width="3" height="3"/><rect x="10.5" y="11" width="3" height="3"/><rect x="16" y="11" width="3" height="3"/><rect x="3" y="6" width="18" height="5" rx="1"/>',
        'check-circle'  => '<path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
        'layers'        => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
        'briefcase'     => '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>',
        'users'         => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>',
        'default'       => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>',
      ];
    @endphp
    <div class="feats-wrap" id="featsWrap">
      <button class="feat-nav feat-nav--prev" id="featPrev" aria-label="Sebelumnya" disabled>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <div class="feats-track" id="featsTrack">
        @php
          $perView = 6;
          $pages = (int) ceil($features->count() / $perView);
        @endphp
        @for($p = 0; $p < $pages; $p++)
          <div class="feat-page{{ $p === 0 ? ' active' : '' }}" data-page="{{ $p }}">
            @foreach($features->slice($p * $perView, $perView) as $i => $f)
              @php $icon = $iconSvgs[$f->icon] ?? $iconSvgs['default']; @endphp
              <div class="feat-card">
                <div class="feat-card__icon" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">{!! $icon !!}</svg>
                </div>
                <h3 class="feat-card__title">{{ $f->title }}</h3>
                <p class="feat-card__desc">{{ $f->description }}</p>
              </div>
            @endforeach
          </div>
        @endfor
      </div>
      <button class="feat-nav feat-nav--next" id="featNext" aria-label="Berikutnya">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
      </button>
    </div>
    <div class="feat-controls">
      <div class="feat-dots" id="featDots">
        @for($d = 0; $d < $pages; $d++)
          <button class="feat-dot{{ $d === 0 ? ' active' : '' }}" data-dot="{{ $d }}" aria-label="Halaman {{ $d+1 }}"></button>
        @endfor
      </div>
      <div class="feat-counter">
        <span id="featRange">1-{{ min($features->count(), 6) }}</span> dari <strong>{{ $features->count() }}</strong> keunggulan
      </div>
    </div>
    @endif
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     ORDERING STEPS
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@if($orderingSteps->isNotEmpty())
<section class="s s-soft s-textured" id="cara-pesan" aria-labelledby="steps-title">
  <div class="container">
    <div class="sh sh--c">
      <div class="sh__eyebrow anim anim-up">Cara Pemesanan</div>
      <h2 class="sh__title anim anim-up d1" id="steps-title">Proses Mudah &amp; Transparan</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Dari konsultasi hingga pengiriman â€” kami memastikan setiap langkah berjalan lancar</p>
    </div>

    <div class="steps__inner">
      @foreach($orderingSteps as $i => $step)
        <div class="step-item anim anim-up d{{ min($i+1,8) }}">
          <div class="step-item__num">{{ str_pad($step->step_number ?? $i+1, 2, '0', STR_PAD_LEFT) }}</div>
          <h3 class="step-item__title">{{ $step->title }}</h3>
          <p class="step-item__desc">{{ $step->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif


{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     PORTFOLIO â€” editorial featured+grid layout
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@if($projects->isNotEmpty())
<section class="s s-charcoal" id="portfolio" aria-labelledby="port-title">
  <div class="container">
    <div class="sh" style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:1.5rem;margin-bottom:3rem">
      <div>
        <div class="sh__eyebrow" style="color:var(--wood-l)">Portfolio Proyek</div>
        <h2 class="sh__title sh__title--light anim anim-up" id="port-title">Karya yang Kami Banggakan</h2>
        <div class="sh__line anim anim-up d1"></div>
        <p class="sh__sub sh__sub--light anim anim-up d2" style="max-width:460px">Setiap proyek adalah bukti nyata dedikasi kami terhadap kualitas dan kepuasan pelanggan</p>
      </div>
      <a href="#kontak" class="btn btn-outline-light anim anim-up d3" style="flex-shrink:0">
        Diskusikan Proyek Anda
        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    @php
      $portFB = [
        'https://images.unsplash.com/photo-1600210492493-0946911123ea?w=800&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=700&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1564540574859-0dfb63985953?w=700&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=700&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=700&q=80&auto=format&fit=crop',
      ];
    @endphp

    {{-- Split: featured (first) + right sub-grid (remaining) --}}
    <div class="port__layout">
      @foreach($projects->take(3) as $i => $proj)
        @php $pimg = $proj->images->first()?->image_path; $pfb = $portFB[$i % count($portFB)]; @endphp
        <article class="port-card anim anim-up d{{ min($i+1,6) }}">
          @if($pimg)
            <img class="port-card__img" src="{{ asset('storage/'.$pimg) }}" alt="{{ $proj->name }}" loading="lazy" onerror="this.src='{{ $pfb }}'">
          @else
            <img class="port-card__img" src="{{ $pfb }}" alt="{{ $proj->name }}" loading="lazy">
          @endif
          <div class="port-card__ov" aria-hidden="true"></div>
          <div class="port-card__body">
            @if($proj->category) <p class="port-card__cat">{{ $proj->category }}</p> @endif
            <h3 class="port-card__name">{{ $proj->name }}</h3>
            <p class="port-card__meta">
              @if($proj->location)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                {{ $proj->location }}@if($proj->year),&nbsp;@endif
              @endif
              @if($proj->year){{ $proj->year }}@endif
            </p>
          </div>
        </article>
      @endforeach
    </div>

    {{-- Row 2: remaining projects in a 3-col grid --}}
    @if($projects->count() > 3)
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;margin-top:1.25rem">
      @foreach($projects->skip(3)->take(3) as $i => $proj)
        @php $pimg = $proj->images->first()?->image_path; $pfb = $portFB[($i+3) % count($portFB)]; @endphp
        <article class="port-card anim anim-up d{{ min($i+1,6) }}" style="aspect-ratio:4/3">
          @if($pimg)
            <img class="port-card__img" src="{{ asset('storage/'.$pimg) }}" alt="{{ $proj->name }}" loading="lazy" onerror="this.src='{{ $pfb }}'">
          @else
            <img class="port-card__img" src="{{ $pfb }}" alt="{{ $proj->name }}" loading="lazy">
          @endif
          <div class="port-card__ov" aria-hidden="true"></div>
          <div class="port-card__body">
            @if($proj->category) <p class="port-card__cat">{{ $proj->category }}</p> @endif
            <h3 class="port-card__name">{{ $proj->name }}</h3>
            <p class="port-card__meta">
              @if($proj->location)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                {{ $proj->location }}
              @endif
            </p>
          </div>
        </article>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     TESTIMONIALS â€” dimensional cards + drag carousel
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@if($testimonials->isNotEmpty())
<section class="s s-soft s-textured" id="testimoni" aria-labelledby="testi-title">
  <div class="container">
    <div class="sh sh--c">
      <div class="sh__eyebrow anim anim-up">Testimoni Pelanggan</div>
      <h2 class="sh__title anim anim-up d1" id="testi-title">Kata Mereka tentang ALL FURNITURE</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Kepercayaan pelanggan adalah motivasi terbesar kami untuk terus berkembang</p>
    </div>

    <div class="testi__wrap anim anim-up d2">
      <div class="testi__slider" id="testiSlider" role="list">
        @foreach($testimonials as $i => $t)
          <article class="testi-card" role="listitem">
            <div class="testi-card__stars" aria-label="Rating {{ $t->rating ?? 5 }} dari 5">
              @for($s=1;$s<=5;$s++)
                <svg viewBox="0 0 24 24" fill="{{ $s<=($t->rating??5)?'currentColor':'none' }}" stroke="currentColor" stroke-width="1.5">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
              @endfor
            </div>
            <blockquote class="testi-card__text">"{{ $t->message }}"</blockquote>
            <div class="testi-card__author">
              @if($t->photo_path)
                <img class="testi-card__av" src="{{ asset('storage/'.$t->photo_path) }}" alt="{{ $t->name }}" loading="lazy"
                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                <div class="testi-card__av-ph" style="display:none" aria-hidden="true">{{ strtoupper(substr($t->name,0,1)) }}</div>
              @else
                <div class="testi-card__av-ph" aria-hidden="true">{{ strtoupper(substr($t->name,0,1)) }}</div>
              @endif
              <div>
                <p class="testi-card__name">{{ $t->name }}</p>
                @if($t->project_type)<p class="testi-card__proj">{{ $t->project_type }}</p>@endif
              </div>
            </div>
          </article>
        @endforeach
      </div>

      {{-- Controls --}}
      <div class="testi__ctrl" aria-label="Navigasi carousel">
        <button class="testi__btn" id="testiPrev" aria-label="Sebelumnya">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <div class="testi__dots" id="testiDots" role="tablist"></div>
        <button class="testi__btn" id="testiNext" aria-label="Berikutnya">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>
@endif

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     FAQ
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<section class="s s-white" id="faq" aria-labelledby="faq-title">
  <div class="container">
    <div class="sh sh--c">
      <div class="sh__eyebrow anim anim-up">FAQ</div>
      <h2 class="sh__title anim anim-up d1" id="faq-title">Pertanyaan yang Sering Diajukan</h2>
      <div class="sh__line anim anim-up d1"></div>
      <p class="sh__sub anim anim-up d2">Tidak menemukan jawaban? Hubungi kami langsung via WhatsApp</p>
    </div>

    <div class="faq__inner anim anim-up d2">
      @if($faqs->isNotEmpty())
        @foreach($faqs as $idx => $faq)
          <div class="faq-item{{ $idx===0 ? ' open' : '' }}" id="faq-item-{{ $faq->id }}">
            <button class="faq-item__btn" aria-expanded="{{ $idx===0?'true':'false' }}" aria-controls="faq-body-{{ $faq->id }}">
              <span class="faq-item__q">{{ $faq->question }}</span>
              <span class="faq-item__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              </span>
            </button>
            <div class="faq-item__body" id="faq-body-{{ $faq->id }}" role="region">
              <div class="faq-item__body-inner"><p class="faq-item__a">{{ $faq->answer }}</p></div>
            </div>
          </div>
        @endforeach
      @else
        @php $sfaqs=[
          ['q'=>'Apakah tersedia furniture untuk rumah dan sekolah?','a'=>'Ya, kami menyediakan furniture untuk kedua segmen dengan desain yang sesuai kebutuhan masing-masing.'],
          ['q'=>'Apakah bisa memesan furniture custom?','a'=>'Tentu saja. Kami menawarkan layanan furniture custom sesuai desain, ukuran, warna, dan material yang Anda inginkan.'],
          ['q'=>'Bagaimana cara meminta penawaran harga?','a'=>'Hubungi kami melalui WhatsApp atau isi formulir kontak. Tim kami akan merespons dalam 1Ã—24 jam.'],
          ['q'=>'Apakah tersedia layanan pengiriman dan pemasangan?','a'=>'Ya, layanan pengiriman ke seluruh Indonesia tersedia beserta jasa pemasangan oleh tim profesional kami.'],
          ['q'=>'Berapa lama waktu produksi furniture?','a'=>'Produk standar 7â€“14 hari kerja. Furniture custom akan diestimasi setelah konsultasi desain dikonfirmasi.'],
          ['q'=>'Apakah ada garansi produk?','a'=>'Ya, semua produk kami dilengkapi garansi kualitas material dan finishing terhadap cacat produksi.'],
        ]; @endphp
        @foreach($sfaqs as $idx => $item)
          <div class="faq-item{{ $idx===0?' open':'' }}">
            <button class="faq-item__btn" aria-expanded="{{ $idx===0?'true':'false' }}" aria-controls="sfaq-{{ $idx }}">
              <span class="faq-item__q">{{ $item['q'] }}</span>
              <span class="faq-item__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              </span>
            </button>
            <div class="faq-item__body" id="sfaq-{{ $idx }}" role="region">
              <div class="faq-item__body-inner"><p class="faq-item__a">{{ $item['a'] }}</p></div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     CTA BAND
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<section class="cta-band" aria-labelledby="cta-title">
  <div class="cta-band__inner">
    <div class="anim anim-left">
      <h2 class="cta-band__title" id="cta-title">Siap Mewujudkan Ruang Impian Anda?</h2>
      <p class="cta-band__desc">Konsultasikan kebutuhan furniture Anda bersama tim kami. Gratis, tanpa biaya, tanpa kewajiban.</p>
    </div>
    <div class="cta-band__acts anim anim-right">
      <a href="https://wa.me/{{ $settings->get('contact_whatsapp')?->value ?? '6281234567890' }}" target="_blank" rel="noopener" class="btn btn-primary">
        <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        Chat WhatsApp
      </a>
      <a href="#kontak" class="btn btn-outline-light">Isi Form Konsultasi</a>
    </div>
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     CONTACT
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@php
  $wa      = $settings->get('contact_whatsapp')?->value ?? '6281234567890';
  $email   = $settings->get('contact_email')?->value    ?? 'info@allfurniture.com';
  $address = $settings->get('contact_address')?->value  ?? 'Jl. Raya No. 123, Jakarta Selatan';
  $hours   = $settings->get('contact_hours')?->value    ?? 'Senin â€“ Sabtu: 08:00 â€“ 17:00';
@endphp

<section class="s s-lt" id="kontak" aria-labelledby="kontak-title">
  <div class="container">
    <div class="contact__inner">

      {{-- Left: info --}}
      <div class="anim anim-left">
        <div class="sh__eyebrow">Hubungi Kami</div>
        <h2 class="sh__title" id="kontak-title">Konsultasikan Kebutuhan Furniture Anda</h2>
        <div class="sh__line"></div>
        <p style="font-size:.975rem;color:var(--dk-grey);line-height:1.8;margin-bottom:2rem">
          Tim kami siap membantu Anda â€” dari pemilihan desain hingga pengiriman dan pemasangan.
        </p>

        <div class="contact__info-card">
          <div class="contact__info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <div><p class="contact__info-label">Showroom</p><p class="contact__info-val">{{ $address }}</p></div>
        </div>
        <div class="contact__info-card">
          <div class="contact__info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <div><p class="contact__info-label">Jam Operasional</p><p class="contact__info-val">{{ $hours }}</p></div>
        </div>
        <div class="contact__info-card">
          <div class="contact__info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
          <div><p class="contact__info-label">Email</p><p class="contact__info-val"><a href="mailto:{{ $email }}" style="color:var(--wood)">{{ $email }}</a></p></div>
        </div>

        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener" class="wa-btn" aria-label="Chat WhatsApp ALL FURNITURE">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          Chat WhatsApp Sekarang
        </a>

        @if($socialLinks->isNotEmpty())
        <div style="display:flex;gap:.6rem;flex-wrap:wrap">
          @foreach($socialLinks as $sl)
            <a href="{{ $sl->url }}" target="_blank" rel="noopener" aria-label="{{ $sl->platform }}"
               style="width:40px;height:40px;background:var(--white);border:1px solid var(--br);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--dk-grey);transition:var(--t)"
               onmouseover="this.style.background='var(--wood)';this.style.color='var(--white)'"
               onmouseout="this.style.background='var(--white)';this.style.color='var(--dk-grey)'">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
            </a>
          @endforeach
        </div>
        @endif
      </div>

      {{-- Right: form --}}
      <div class="anim anim-right">
        <div class="cf">
          <h3 class="cf__title">Kirim Pesan</h3>
          <p class="cf__sub">Isi form di bawah â€” tim kami merespons dalam 1Ã—24 jam</p>

          @if(session('contact_success'))
            <div class="alert-ok" role="alert">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              {{ session('contact_success') }}
            </div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST" novalidate>
            @csrf
            <div class="fg">
              <label class="flabel" for="c-name">Nama Lengkap <span class="freq" aria-hidden="true">*</span></label>
              <input type="text" id="c-name" name="name" class="finput" placeholder="Nama lengkap Anda" value="{{ old('name') }}" required autocomplete="name">
              @error('name')<p class="ferr">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="flabel" for="c-wa">Nomor WhatsApp <span class="freq" aria-hidden="true">*</span></label>
              <input type="tel" id="c-wa" name="whatsapp" class="finput" placeholder="Contoh: 08123456789" value="{{ old('whatsapp') }}" required autocomplete="tel">
              @error('whatsapp')<p class="ferr">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="flabel" for="c-email">Email <span style="color:var(--md-grey);font-weight:400">(Opsional)</span></label>
              <input type="email" id="c-email" name="email" class="finput" placeholder="email@contoh.com" value="{{ old('email') }}" autocomplete="email">
              @error('email')<p class="ferr">{{ $message }}</p>@enderror
            </div>
            <div class="fg">
              <label class="flabel" for="c-req">Kebutuhan Furniture <span class="freq" aria-hidden="true">*</span></label>
              <textarea id="c-req" name="requirement" class="finput" placeholder="Ceritakan kebutuhan furniture Anda â€” jenis, ruangan, ukuran, dsb." required>{{ old('requirement') }}</textarea>
              @error('requirement')<p class="ferr">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="fsubmit">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              Kirim Pesan
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     FOOTER
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
@php
  $footDesc = $settings->get('footer_description')?->value ?? 'Menyediakan furniture berkualitas premium untuk rumah, sekolah, dan kantor dengan desain modern dan material terbaik.';
  $footCopy = $settings->get('footer_copyright')?->value   ?? 'ALL FURNITURE. All rights reserved.';
  $privLink = $settings->get('footer_privacy_link')?->value ?? '#';
@endphp

<footer class="foot" role="contentinfo">
  <div class="foot__accent" aria-hidden="true"></div>

  <div class="foot__main">
    {{-- Brand --}}
    <div>
      <a href="{{ route('home') }}" class="foot__logo"><em>ALL</em> FURNITURE</a>
      <p class="foot__desc">{{ $footDesc }}</p>
      @if($socialLinks->isNotEmpty())
        <div class="foot__socials">
          @foreach($socialLinks as $sl)
            <a href="{{ $sl->url }}" target="_blank" rel="noopener" class="foot__soc-link" aria-label="{{ $sl->platform }}">
              <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><circle cx="12" cy="12" r="10"/></svg>
            </a>
          @endforeach
        </div>
      @else
        <div class="foot__socials">
          <a href="#" class="foot__soc-link" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="#" class="foot__soc-link" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="#" class="foot__soc-link" aria-label="TikTok">
            <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.77a4.85 4.85 0 01-1.01-.08z"/></svg>
          </a>
        </div>
      @endif
    </div>

    {{-- Navigasi --}}
    <div>
      <h3 class="foot__h">Navigasi</h3>
      <ul class="foot__links">
        <li><a href="#beranda"    class="foot__link">Beranda</a></li>
        <li><a href="#produk"     class="foot__link">Produk</a></li>
        <li><a href="#kategori"   class="foot__link">Kategori</a></li>
        <li><a href="#tentang"    class="foot__link">Tentang Kami</a></li>
        <li><a href="#keunggulan" class="foot__link">Keunggulan</a></li>
        @if($projects->isNotEmpty())<li><a href="#portfolio" class="foot__link">Portfolio</a></li>@endif
        <li><a href="#kontak"     class="foot__link">Kontak</a></li>
      </ul>
    </div>

    {{-- Produk --}}
    <div>
      <h3 class="foot__h">Produk</h3>
      <ul class="foot__links">
        @foreach($categories->take(6) as $cat)
          <li><a href="#produk" class="foot__link">{{ $cat->name }}</a></li>
        @endforeach
      </ul>
    </div>

    {{-- Kontak --}}
    <div>
      <h3 class="foot__h">Kontak</h3>
      @if($address)
        <div class="foot__ci">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>{{ $address }}</span>
        </div>
      @endif
      @if($hours)
        <div class="foot__ci">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          <span>{{ $hours }}</span>
        </div>
      @endif
      @if($wa)
        <div class="foot__ci">
          <svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          <span><a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener" class="foot__link">+{{ $wa }}</a></span>
        </div>
      @endif
      @if($email)
        <div class="foot__ci">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <span><a href="mailto:{{ $email }}" class="foot__link">{{ $email }}</a></span>
        </div>
      @endif
    </div>
  </div>

  <div class="foot__bottom">
    <p class="foot__copy">&copy; {{ date('Y') }} {{ $footCopy }}</p>
    <div class="foot__legal">
      <a href="{{ $privLink }}">Kebijakan Privasi</a>
      <a href="#">Syarat &amp; Ketentuan</a>
    </div>
  </div>
</footer>

{{-- Back to top --}}
<button id="btt" aria-label="Kembali ke atas">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg>
</button>


{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     JAVASCRIPT â€” all interactions & animations
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<script>
(function(){
'use strict';

/* â”€â”€ Init Lucide â”€â”€ */
if(typeof lucide!=='undefined') lucide.createIcons();

/* â”€â”€ Helpers â”€â”€ */
const $  = (sel,ctx=document) => ctx.querySelector(sel);
const $$ = (sel,ctx=document) => [...ctx.querySelectorAll(sel)];
const onScroll = fn => window.addEventListener('scroll',fn,{passive:true});

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   1. NAVBAR â€” scroll shadow + active section
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const navbar = $('#navbar');
const navLinks = $$('.nav__link');

function updateNav(){
  const y = window.scrollY;
  // Shadow
  navbar.classList.toggle('scrolled', y > 40);

  // Active link
  const sectionIds = ['beranda','kategori','produk','tentang','keunggulan','portfolio','testimoni','faq','kontak'];
  let current = '';
  sectionIds.forEach(id=>{
    const el = document.getElementById(id);
    if(el && y >= el.offsetTop - 130) current = id;
  });
  navLinks.forEach(l=>{
    l.classList.toggle('active', l.getAttribute('href')==='#'+current);
  });
}
onScroll(updateNav);
updateNav();

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   2. MOBILE DRAWER
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const burgerBtn  = $('#burgerBtn');
const drawer     = $('#drawer');
const drawerBg   = $('#drawerBg');
const drawerClose= $('#drawerClose');

function openDrawer(){
  drawer.classList.add('open');
  burgerBtn.classList.add('open');
  burgerBtn.setAttribute('aria-expanded','true');
  document.body.style.overflow='hidden';
}
function closeDrawer(){
  drawer.classList.remove('open');
  burgerBtn.classList.remove('open');
  burgerBtn.setAttribute('aria-expanded','false');
  document.body.style.overflow='';
}
if(burgerBtn)  burgerBtn.addEventListener('click', openDrawer);
if(drawerClose)drawerClose.addEventListener('click', closeDrawer);
if(drawerBg)   drawerBg.addEventListener('click', closeDrawer);
$$('.drawer__nav a, .drawer__foot a').forEach(a=>a.addEventListener('click', closeDrawer));
document.addEventListener('keydown',e=>{ if(e.key==='Escape') closeDrawer(); });

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   3. SMOOTH SCROLL for anchor links
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
$$('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',function(e){
    const id = this.getAttribute('href').slice(1);
    if(!id) return;
    const target = document.getElementById(id);
    if(!target) return;
    e.preventDefault();
    const offset = (navbar ? navbar.offsetHeight : 70) + 16;
    window.scrollTo({ top: target.offsetTop - offset, behavior:'smooth' });
  });
});

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   4. INTERSECTION OBSERVER â€” scroll animations
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if(!prefersReduced && 'IntersectionObserver' in window){
  const animObs = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
      if(!entry.isIntersecting) return;
      const el = entry.target;
      el.classList.add('in');
      animObs.unobserve(el);
    });
  },{threshold:0.1, rootMargin:'0px 0px -48px 0px'});

  // Stagger children inside grid containers
  const staggerParents = $$('.cats__grid, .products__grid, .feats__grid, .steps__inner, .testi__slider');
  staggerParents.forEach(parent=>{
    $$(':scope > *', parent).forEach((child, i)=>{
      if(!child.classList.contains('anim')){
        child.classList.add('anim','anim-up');
        // add stagger delay via inline style (capped at 8 steps)
        child.style.transitionDelay = (Math.min(i,7) * 0.08) + 's';
      }
    });
  });

  $$('.anim').forEach(el=>animObs.observe(el));
} else {
  // Reduced motion or no IO: show all immediately
  $$('.anim').forEach(el=>el.classList.add('in'));
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   5. COUNTER ANIMATION â€” stats
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
function animateCounter(el, target, suffix, duration=1800){
  const start   = performance.now();
  const startVal = 0;
  function step(now){
    const progress = Math.min((now - start) / duration, 1);
    // Ease out cubic
    const eased = 1 - Math.pow(1 - progress, 3);
    const current = Math.round(startVal + (target - startVal) * eased);
    el.textContent = current.toLocaleString('id-ID') + suffix;
    if(progress < 1) requestAnimationFrame(step);
  }
  requestAnimationFrame(step);
}

const counterEls = $$('[data-count]');
if(counterEls.length && 'IntersectionObserver' in window){
  const cObs = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
      if(!entry.isIntersecting) return;
      const el     = entry.target;
      const target = parseInt(el.getAttribute('data-count'),10);
      const suffix = el.getAttribute('data-suffix') || '';
      if(!prefersReduced) animateCounter(el, target, suffix);
      cObs.unobserve(el);
    });
  },{threshold:0.4});
  counterEls.forEach(el=>cObs.observe(el));
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   6. TESTIMONIAL CAROUSEL â€” drag + buttons + dots
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const slider   = $('#testiSlider');
const prevBtn  = $('#testiPrev');
const nextBtn  = $('#testiNext');
const dotsWrap = $('#testiDots');

if(slider){
  const cards = $$('.testi-card', slider);
  let current = 0;
  let perView = 3;
  let startX = 0, isDragging = false, startLeft = 0;

  function getPerView(){
    const w = window.innerWidth;
    if(w <= 768) return 1;
    if(w <= 1024) return 2;
    return 3;
  }

  function getMaxIndex(){
    return Math.max(0, cards.length - perView);
  }

  // Build dots
  function buildDots(){
    perView = getPerView();
    const total = getMaxIndex() + 1;
    dotsWrap.innerHTML = '';
    for(let i=0;i<total;i++){
      const d = document.createElement('button');
      d.className = 'testi__dot' + (i===current?' active':'');
      d.setAttribute('aria-label','Slide '+(i+1));
      d.setAttribute('role','tab');
      d.addEventListener('click',()=>goTo(i));
      dotsWrap.appendChild(d);
    }
  }

  function goTo(idx){
    current = Math.max(0, Math.min(idx, getMaxIndex()));
    const cardW = cards[0] ? cards[0].offsetWidth + 24 : 0; // 24 = gap
    slider.scrollTo({ left: current * cardW, behavior: prefersReduced ? 'auto' : 'smooth' });
    // Update dots
    $$('.testi__dot', dotsWrap).forEach((d,i)=>d.classList.toggle('active',i===current));
  }

  if(prevBtn) prevBtn.addEventListener('click',()=>goTo(current-1));
  if(nextBtn) nextBtn.addEventListener('click',()=>goTo(current+1));

  // Drag support
  slider.addEventListener('mousedown',e=>{
    isDragging=true; startX=e.clientX; startLeft=slider.scrollLeft;
    slider.classList.add('dragging');
  });
  window.addEventListener('mousemove',e=>{
    if(!isDragging) return;
    slider.scrollLeft = startLeft - (e.clientX - startX);
  });
  window.addEventListener('mouseup',()=>{
    if(!isDragging) return;
    isDragging = false;
    slider.classList.remove('dragging');
    // Snap to nearest
    const cardW = cards[0] ? cards[0].offsetWidth + 24 : 1;
    goTo(Math.round(slider.scrollLeft / cardW));
  });

  // Touch support
  slider.addEventListener('touchstart',e=>{ startX=e.touches[0].clientX; startLeft=slider.scrollLeft; },{passive:true});
  slider.addEventListener('touchend',e=>{
    const diff = startX - e.changedTouches[0].clientX;
    if(Math.abs(diff) > 50) goTo(diff > 0 ? current+1 : current-1);
  });

  // Auto-play (pause on hover)
  let autoTimer;
  function startAuto(){ autoTimer = setInterval(()=>{ goTo(current >= getMaxIndex() ? 0 : current+1); }, 5000); }
  function stopAuto(){ clearInterval(autoTimer); }
  slider.addEventListener('mouseenter', stopAuto);
  slider.addEventListener('mouseleave', startAuto);
  slider.addEventListener('touchstart', stopAuto, {passive:true});
  slider.addEventListener('touchend', startAuto);

  buildDots();
  startAuto();
  window.addEventListener('resize',()=>{ buildDots(); goTo(0); });
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   7. FAQ ACCORDION
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
$$('.faq-item__btn').forEach(btn=>{
  btn.addEventListener('click',function(){
    const item   = this.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    // Close all
    $$('.faq-item').forEach(i=>{
      i.classList.remove('open');
      i.querySelector('.faq-item__btn')?.setAttribute('aria-expanded','false');
    });
    // Open clicked (if it was closed)
    if(!isOpen){
      item.classList.add('open');
      this.setAttribute('aria-expanded','true');
    }
  });
});

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   8. BACK TO TOP
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const btt = document.getElementById('btt');
if(btt){
  onScroll(()=> btt.classList.toggle('visible', window.scrollY > 500));
  btt.addEventListener('click',()=> window.scrollTo({top:0,behavior:prefersReduced?'auto':'smooth'}));
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   9. SUBTLE HERO PARALLAX (transform only, no layout)
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
if(!prefersReduced){
  const heroVisual = document.getElementById('heroVisual');
  if(heroVisual){
    let ticking = false;
    onScroll(()=>{
      if(ticking) return;
      requestAnimationFrame(()=>{
        const y = window.scrollY;
        if(y < window.innerHeight * 1.2){
          heroVisual.style.transform = `translateY(${y * 0.08}px)`;
        }
        ticking = false;
      });
      ticking = true;
    });
  }
}

/* CATEGORIES CAROUSEL */
(function(){
  var track = document.getElementById('catsTrack');
  if(!track) return;
  var cards = track.querySelectorAll('.cat-card');
  var prevBtn = document.getElementById('catsPrev');
  var nextBtn = document.getElementById('catsNext');
  var dotsWrap = document.getElementById('catsDots');
  var allBtn = document.getElementById('catsAllBtn');
  var total = cards.length;
  var current = 0;
  var perView = window.innerWidth <= 480 ? 1 : (window.innerWidth <= 768 ? 2 : 3);
  var maxIndex = Math.max(0, total - perView);
  var autoplayTimer = null;
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Build dots
  if(dotsWrap){
    var dotCount = maxIndex + 1;
    for(var d = 0; d < dotCount; d++){
      var dot = document.createElement('button');
      dot.className = 'cats-dot' + (d === 0 ? ' active' : '');
      dot.setAttribute('data-dot', d);
      dot.setAttribute('aria-label', 'Halaman ' + (d+1));
      dot.addEventListener('click', function(){ goTo(parseInt(this.getAttribute('data-dot'))); });
      dotsWrap.appendChild(dot);
    }
  }

  function getPerView(){
    return window.innerWidth <= 480 ? 1 : (window.innerWidth <= 768 ? 2 : 3);
  }
  function getScrollAmount(){
    if(cards.length === 0) return 0;
    var cardW = cards[0].offsetWidth;
    var gap = 20; // 1.25rem gap
    return cardW + gap;
  }
  function updateUI(){
    perView = getPerView();
    maxIndex = Math.max(0, total - perView);
    current = Math.min(current, maxIndex);

    // Scroll track
    var scrollAmount = current * getScrollAmount();
    track.scrollTo({ left: scrollAmount, behavior: prefersReduced ? 'auto' : 'smooth' });

    // Update buttons
    prevBtn.disabled = current === 0;
    nextBtn.disabled = current >= maxIndex;

    // Update dots
    if(dotsWrap){
      var dots = dotsWrap.querySelectorAll('.cats-dot');
      dots.forEach(function(d, i){ d.classList.toggle('active', i === current); });
    }
  }

  function goTo(idx){
    current = Math.max(0, Math.min(idx, maxIndex));
    updateUI();
    stopAutoplay();
  }
  function next(){ if(current >= maxIndex) current = 0; else current++; updateUI(); }
  function prev(){ if(current <= 0) current = maxIndex; else current--; updateUI(); }

  prevBtn.addEventListener('click', prev);
  nextBtn.addEventListener('click', next);

  // Touch swipe
  var touchStartX = 0;
  track.addEventListener('touchstart', function(e){ touchStartX = e.changedTouches[0].screenX; stopAutoplay(); }, {passive:true});
  track.addEventListener('touchend', function(e){
    var diff = touchStartX - e.changedTouches[0].screenX;
    if(Math.abs(diff) > 50){ if(diff > 0) goTo(current + 1); else goTo(current - 1); }
  }, {passive:true});

  // Mouse drag
  var isDragging = false; var dragStartX = 0; var dragStartScroll = 0;
  track.addEventListener('mousedown', function(e){
    isDragging = true; dragStartX = e.clientX; dragStartScroll = track.scrollLeft;
    track.style.cursor = 'grabbing'; stopAutoplay();
  });
  window.addEventListener('mousemove', function(e){
    if(!isDragging) return;
    track.scrollLeft = dragStartScroll - (e.clientX - dragStartX);
  });
  window.addEventListener('mouseup', function(){
    if(!isDragging) return;
    isDragging = false; track.style.cursor = '';
    // Snap to nearest
    var sa = getScrollAmount();
    if(sa > 0) goTo(Math.round(track.scrollLeft / sa));
  });

  // Autoplay
  function startAutoplay(){
    if(prefersReduced) return;
    autoplayTimer = setInterval(function(){
      if(current >= maxIndex) current = 0; else current++;
      updateUI();
    }, 5000);
  }
  function stopAutoplay(){ if(autoplayTimer){ clearInterval(autoplayTimer); autoplayTimer = null; } }

  var wrap = track.parentElement;
  wrap.addEventListener('mouseenter', stopAutoplay);
  wrap.addEventListener('mouseleave', startAutoplay);
  wrap.addEventListener('touchstart', stopAutoplay, {passive:true});

  // "Lihat Semua Kategori" button - open all categories popup
  if(allBtn){
    allBtn.addEventListener('click', function(){
      var catsAllOv = document.getElementById('catsAllOv');
      if(catsAllOv){
        catsAllOv.classList.add('open');
        document.body.style.overflow = 'hidden';
        // Reset search
        var searchInput = document.getElementById('catsAllSearch');
        if(searchInput) searchInput.value = '';
        filterCatsAll('');
      }
    });
  }

  // Responsive recalc
  var resizeTimer;
  window.addEventListener('resize', function(){
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(updateUI, 200);
  });

  // Init
  updateUI();
  startAutoplay();
})();

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   10. MARQUEE PAUSE ON HOVER
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
const track = $('.strip__track');
if(track){
  track.addEventListener('mouseenter',()=> track.style.animationPlayState='paused');
  track.addEventListener('mouseleave',()=> track.style.animationPlayState='running');
}


/* FEATURES SLIDER */
(function(){
  var track = document.getElementById('featsTrack');
  if(!track) return;
  var pages = track.querySelectorAll('.feat-page');
  var prevBtn = document.getElementById('featPrev');
  var nextBtn = document.getElementById('featNext');
  var dotsWrap = document.getElementById('featDots');
  var dots = dotsWrap ? dotsWrap.querySelectorAll('.feat-dot') : [];
  var rangeEl = document.getElementById('featRange');
  var total = pages.length;
  var current = 0;
  var totalItems = track.querySelectorAll('.feat-card').length;
  var autoplayTimer = null;
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function updateUI(){
    pages.forEach(function(pg, i){ pg.classList.toggle('active', i === current); });
    dots.forEach(function(d, i){ d.classList.toggle('active', i === current); });
    prevBtn.disabled = current === 0;
    nextBtn.disabled = current === total - 1;
    var startItem = current * 6 + 1;
    var endItem = Math.min((current + 1) * 6, totalItems);
    if(rangeEl) rangeEl.textContent = startItem + '-' + endItem;
  }
  function goTo(idx){
    current = Math.max(0, Math.min(idx, total - 1));
    updateUI();
    stopAutoplay();
  }
  prevBtn.addEventListener('click', function(){ goTo(current - 1); });
  nextBtn.addEventListener('click', function(){ goTo(current + 1); });
  dots.forEach(function(d, i){ d.addEventListener('click', function(){ goTo(i); }); });
  var touchStartX = 0;
  track.addEventListener('touchstart', function(e){ touchStartX = e.changedTouches[0].screenX; stopAutoplay(); }, {passive:true});
  track.addEventListener('touchend', function(e){
    var diff = touchStartX - e.changedTouches[0].screenX;
    if(Math.abs(diff) > 50){ if(diff > 0) goTo(current + 1); else goTo(current - 1); }
  }, {passive:true});
  function startAutoplay(){
    if(prefersReduced) return;
    autoplayTimer = setInterval(function(){
      if(current >= total - 1) current = 0; else current++;
      updateUI();
    }, 4500);
  }
  function stopAutoplay(){ if(autoplayTimer){ clearInterval(autoplayTimer); autoplayTimer = null; } }
  var wrap = document.getElementById('featsWrap');
  wrap.addEventListener('mouseenter', stopAutoplay);
  wrap.addEventListener('mouseleave', startAutoplay);
  wrap.addEventListener('touchstart', stopAutoplay, {passive:true});
  updateUI();
  startAutoplay();
})();
/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   11. IMAGE ERROR FALLBACK
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
$$('img[loading="lazy"]').forEach(img=>{
  if(!img.hasAttribute('onerror')){
    img.addEventListener('error',function(){ this.style.opacity='0.2'; });
  }
});

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   12. PRODUCT CARD â€” keyboard accessible overlay
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
$$('.prod-card').forEach(card=>{
  card.setAttribute('tabindex','0');
  card.addEventListener('keydown',e=>{
    if(e.key==='Enter'||e.key===' '){
      e.preventDefault();
      const link = card.querySelector('a');
      if(link) link.click();
    }
  });
});

})();
</script>

{{-- ═══════════════════════════════════════════════════════
     CATEGORY DETAIL MODAL
     ═══════════════════════════════════════════════════════ --}}
@php $waNum = $settings->get('contact_whatsapp')?->value ?? '6281234567890'; @endphp

{{-- ═══════════════════════════════════════════════════════
     ALL CATEGORIES POPUP
     ═══════════════════════════════════════════════════════ --}}
@php $catFallbacksAll = [
  'furniture-ruang-tamu'        => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&q=80&auto=format&fit=crop',
  'furniture-kamar-tidur'       => 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=500&q=80&auto=format&fit=crop',
  'furniture-ruang-makan'       => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=500&q=80&auto=format&fit=crop',
  'meja-dan-kursi-sekolah'      => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=500&q=80&auto=format&fit=crop',
  'meja-guru-dan-furniture-guru'=> 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=500&q=80&auto=format&fit=crop',
  'lemari-dan-rak-penyimpanan'  => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&q=80&auto=format&fit=crop',
  'furniture-kantor'            => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=500&q=80&auto=format&fit=crop',
  'furniture-custom'            => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?w=500&q=80&auto=format&fit=crop',
];
@endphp

<div class="catsall-ov" id="catsAllOv" role="dialog" aria-modal="true" aria-label="Semua Kategori">
  <div class="catsall-modal" id="catsAllModal">
    <button class="catsall-close" id="catsAllClose" aria-label="Tutup">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </button>
    <div class="catsall-header">
      <h2 class="catsall-title">Jelajahi Semua Kategori</h2>
      <p class="catsall-desc">Temukan furniture untuk setiap ruang — dari rumah, sekolah, hingga kantor. Klik kategori untuk melihat koleksi lengkap.</p>
      <div class="catsall-search-wrap">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" class="catsall-search" id="catsAllSearch" placeholder="Cari kategori furniture...">
      </div>
    </div>
    <div class="catsall-body">
      <div class="catsall-grid" id="catsAllGrid">
        @foreach($categories as $i => $cat)
          @php $fbAll = $catFallbacksAll[$cat->slug] ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=500&q=80&auto=format&fit=crop'; @endphp
          <button type="button"
            class="catsall-card"
            data-slug="{{ $cat->slug }}"
            data-name="{{ e($cat->name) }}"
            data-desc="{{ e($cat->description ?? '') }}"
            data-img="{{ $cat->image_path ? asset('storage/'.$cat->image_path) : $fbAll }}"
            data-search="{{ strtolower($cat->name . ' ' . ($cat->description ?? '')) }}"
            aria-label="Lihat produk kategori {{ $cat->name }}">
            <div class="catsall-card__img-wrap">
              @if($cat->image_path)
                <img class="catsall-card__img" src="{{ asset('storage/'.$cat->image_path) }}" alt="{{ $cat->name }}" loading="lazy" onerror="this.src='{{ $fbAll }}'">
              @else
                <img class="catsall-card__img" src="{{ $fbAll }}" alt="{{ $cat->name }}" loading="lazy">
              @endif
            </div>
            <div class="catsall-card__overlay" aria-hidden="true"></div>
            <div class="catsall-card__body">
              <p class="catsall-card__name">{{ $cat->name }}</p>
              <span class="catsall-card__arrow">
                Lihat Koleksi
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </div>
          </button>
        @endforeach
      </div>
      <div class="catsall-empty" id="catsAllEmpty" style="display:none">
        <div class="catsall-empty-ico">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <p class="catsall-empty-t">Kategori tidak ditemukan</p>
        <p class="catsall-empty-s">Coba kata kunci lain atau jelajahi semua kategori di atas.</p>
      </div>
    </div>
  </div>
</div>

{{-- ═══════════════════════════════════════════════════════
     CATEGORY DETAIL MODAL
     ═══════════════════════════════════════════════════════ --}}
@php $waNum = $settings->get('contact_whatsapp')?->value ?? '6281234567890'; @endphp

<div class="cat-modal-ov" id="catModalOv" role="dialog" aria-modal="true" aria-label="Detail Kategori" aria-labelledby="cmoName">
  <div class="cat-modal" id="catModal">

    {{-- Header: gambar + nama + deskripsi --}}
    <div class="cmo-header" id="cmoHeader">
      <img class="cmo-header-img" id="cmoHeaderImg" src="" alt="" loading="lazy">
      <div class="cmo-header-overlay" aria-hidden="true"></div>
      <div class="cmo-header-body">
        <p class="cmo-header-tag">Kategori Furniture</p>
        <h2 class="cmo-header-name" id="cmoName">—</h2>
        <p class="cmo-header-desc" id="cmoDesc"></p>
      </div>
      <button class="cmo-close" id="cmoClose" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
      </button>
    </div>

    {{-- Body: toolbar + product grid --}}
    <div class="cmo-body">
      {{-- Toolbar --}}
      <div class="cmo-toolbar">
        <div class="cmo-search-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
          <input type="text" class="cmo-search" id="cmoSearch"
            placeholder="Cari produk dalam kategori ini..."
            aria-label="Cari produk">
        </div>
        <select class="cmo-sort" id="cmoSort" aria-label="Urutkan produk">
          <option value="default">Urutan Default</option>
          <option value="price-asc">Harga: Termurah</option>
          <option value="price-desc">Harga: Termahal</option>
          <option value="name-asc">Nama: A–Z</option>
          <option value="name-desc">Nama: Z–A</option>
        </select>
        <span class="cmo-count" id="cmoCount"></span>
      </div>

      {{-- Skeleton loading --}}
      <div class="cmo-skeleton" id="cmoSkeleton" style="display:none">
        @for($s=0;$s<6;$s++)
        <div class="cmo-skel-card">
          <div class="cmo-skel-img"></div>
          <div class="cmo-skel-body">
            <div class="cmo-skel-line"></div>
            <div class="cmo-skel-line short"></div>
            <div class="cmo-skel-line xshort"></div>
          </div>
        </div>
        @endfor
      </div>

      {{-- Product grid (rendered by JS) --}}
      <div class="cmo-grid" id="cmoGrid"></div>

      {{-- Empty state --}}
      <div class="cmo-empty" id="cmoEmpty" style="display:none">
        <div class="cmo-empty-ico">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="2" y="7" width="20" height="14" rx="2"/>
            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
          </svg>
        </div>
        <p class="cmo-empty-t" id="cmoEmptyMsg">Belum ada produk</p>
        <p class="cmo-empty-s">Produk untuk kategori ini belum tersedia. Hubungi kami untuk informasi lebih lanjut.</p>
      </div>
    </div>

    {{-- Footer CTA --}}
    <div class="cmo-footer">
      <div class="cmo-footer-text">
        Tertarik? <strong>Konsultasikan kebutuhan Anda</strong> bersama tim kami &mdash; gratis &amp; tanpa kewajiban.
      </div>
      <div class="cmo-footer-acts">
        <a href="#kontak" class="cmo-btn-consult" id="cmoConsultBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
          </svg>
          Konsultasi Gratis
        </a>
        <a href="https://wa.me/{{ $waNum }}" target="_blank" rel="noopener"
           class="cmo-btn-wa" id="cmoWaBtn">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          Tanya via WhatsApp
        </a>
      </div>
    </div>

  </div>{{-- .cat-modal --}}
</div>{{-- .cat-modal-ov --}}

{{-- ═══════════════════════════════════════════════════════
     PRODUCT DETAIL MODAL (layered above category modal)
     ═══════════════════════════════════════════════════════ --}}
@php $waMain = $settings->get('contact_whatsapp')?->value ?? '6281234567890'; @endphp

<div class="pd-overlay" id="pdOverlay" role="dialog" aria-modal="true" aria-label="Detail Produk">
  <div class="pd-modal" id="pdModal">

    <button class="pd-close" id="pdClose" aria-label="Tutup detail produk">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M18 6L6 18M6 6l12 12"/>
      </svg>
    </button>

    <div class="pd-inner">

      {{-- Gallery side --}}
      <div class="pd-gallery">
        <img class="pd-main-img" id="pdMainImg" src="" alt="" loading="lazy">
        <div class="pd-thumbs" id="pdThumbs"></div>
      </div>

      {{-- Info side --}}
      <div class="pd-info">
        <div class="pd-cat" id="pdCat">Kategori</div>
        <h2 class="pd-name" id="pdName">—</h2>

        <div class="pd-badge-row" id="pdBadges"></div>

        <div id="pdPriceWrap">
          <p class="pd-price" id="pdPrice" style="display:none"></p>
          <p class="pd-price-na" id="pdPriceNa" style="display:none">Hubungi untuk harga</p>
        </div>

        <div class="pd-desc" id="pdDesc"></div>

        {{-- Specs --}}
        <div class="pd-specs" id="pdSpecsWrap" style="display:none">
          <p class="pd-specs-title">Spesifikasi</p>
          <div class="pd-spec-grid" id="pdSpecs"></div>
        </div>

        {{-- Materials --}}
        <div class="pd-materials" id="pdMatsWrap" style="display:none">
          <p class="pd-specs-title">Material & Bahan Baku</p>
          <div class="pd-materials-list" id="pdMats"></div>
        </div>

        {{-- CTA --}}
        <div class="pd-cta">
          <div class="pd-cta-row" id="pdCtaRow">
            <a href="#" class="pd-btn-wa" id="pdWaBtn" target="_blank" rel="noopener noreferrer">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
              Konsultasi via WhatsApp
            </a>
            <a href="#" class="pd-btn-shopee" id="pdShopeeBtn" target="_blank" rel="noopener noreferrer" style="display:none">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
              Beli di Shopee
            </a>
          </div>
          <p class="pd-shopee-info" id="pdShopeeInfo" style="display:none"></p>
        </div>

      </div>{{-- .pd-info --}}
    </div>{{-- .pd-inner --}}
  </div>{{-- .pd-modal --}}
</div>{{-- .pd-overlay --}}

<script>
(function(){
'use strict';

/* ALL CATEGORIES POPUP */
var catsAllOvEl   = document.getElementById('catsAllOv');
var catsAllClose  = document.getElementById('catsAllClose');
var catsAllSearch = document.getElementById('catsAllSearch');
var catsAllGrid   = document.getElementById('catsAllGrid');
var catsAllEmpty  = document.getElementById('catsAllEmpty');

function closeCatsAll(){
  if(catsAllOvEl) catsAllOvEl.classList.remove('open');
  document.body.style.overflow = '';
}

function filterCatsAll(term){
  if(!catsAllGrid) return;
  var cards = catsAllGrid.querySelectorAll('.catsall-card');
  var visible = 0;
  term = (term || '').toLowerCase().trim();
  cards.forEach(function(card){
    var searchText = card.getAttribute('data-search') || '';
    var match = !term || searchText.indexOf(term) >= 0;
    card.style.display = match ? '' : 'none';
    if(match) visible++;
  });
  if(catsAllEmpty) catsAllEmpty.style.display = visible === 0 ? 'block' : 'none';
}

if(catsAllClose) catsAllClose.addEventListener('click', closeCatsAll);
if(catsAllOvEl) catsAllOvEl.addEventListener('click', function(e){ if(e.target === catsAllOvEl) closeCatsAll(); });

if(catsAllSearch){
  var catsAllSearchTimer;
  catsAllSearch.addEventListener('input', function(){
    clearTimeout(catsAllSearchTimer);
    catsAllSearchTimer = setTimeout(function(){ filterCatsAll(catsAllSearch.value); }, 200);
  });
}

if(catsAllGrid){
  catsAllGrid.addEventListener('click', function(e){
    var card = e.target.closest('.catsall-card');
    if(!card) return;
    var slug = card.getAttribute('data-slug');
    if(!slug) return;
    closeCatsAll();
    var data = {
      slug: slug,
      name: card.getAttribute('data-name') || 'Kategori',
      desc: card.getAttribute('data-desc') || '',
      img:  card.getAttribute('data-img') || '',
    };
    setTimeout(function(){ openModal(data); }, 200);
  });
}

/* ════════════════════════════════════════════
   CATEGORY MODAL — Interactive Detail Popup
   ════════════════════════════════════════════ */

const ov         = document.getElementById('catModalOv');
const modal      = document.getElementById('catModal');
const closeBtn   = document.getElementById('cmoClose');
const headerImg  = document.getElementById('cmoHeaderImg');
const nameEl     = document.getElementById('cmoName');
const descEl     = document.getElementById('cmoDesc');
const gridEl     = document.getElementById('cmoGrid');
const searchEl   = document.getElementById('cmoSearch');
const sortEl     = document.getElementById('cmoSort');
const countEl    = document.getElementById('cmoCount');
const skeletonEl = document.getElementById('cmoSkeleton');
const emptyEl    = document.getElementById('cmoEmpty');
const emptyMsgEl = document.getElementById('cmoEmptyMsg');
const consultBtn = document.getElementById('cmoConsultBtn');
const waBtn      = document.getElementById('cmoWaBtn');

let allProducts = [];
let currentCat  = null;

/* ── Open modal ── */
function openModal(data) {
  currentCat = data;
  // Populate header
  nameEl.textContent = data.name || 'Kategori';
  descEl.textContent = data.desc || '';
  headerImg.src = data.img || '';
  headerImg.alt = data.name || 'Kategori';

  // Show skeleton
  skeletonEl.style.display = 'grid';
  gridEl.innerHTML = '';
  emptyEl.style.display = 'none';
  countEl.innerHTML = '';

  // Open overlay
  ov.classList.add('open');
  document.body.style.overflow = 'hidden';

  // Fetch products
  fetchProducts(data.slug);
}

/* ── Fetch products via JSON endpoint ── */
async function fetchProducts(slug) {
  if (!slug) return;
  try {
    const url = (window._catProductsBase || '/categories') + '/' + slug + '/products';
    const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
    if (!res.ok) throw new Error('HTTP ' + res.status);
    const data = await res.json();
    allProducts = data.products || [];
    skeletonEl.style.display = 'none';
    renderProducts();
  } catch (err) {
    console.error('Category products fetch error:', err);
    skeletonEl.style.display = 'none';
    emptyEl.style.display = 'block';
    emptyMsgEl.textContent = 'Gagal memuat produk. Silakan coba lagi.';
  }
}

/* ── Render products with search + sort ── */
function renderProducts() {
  let products = [...allProducts];

  // Search filter
  const term = (searchEl.value || '').toLowerCase().trim();
  if (term) {
    products = products.filter(p =>
      (p.name || '').toLowerCase().includes(term) ||
      (p.description || '').toLowerCase().includes(term)
    );
  }

  // Sort
  const sortBy = sortEl.value;
  switch (sortBy) {
    case 'price-asc':
      products.sort((a, b) => (parseFloat(a.price) || 0) - (parseFloat(b.price) || 0));
      break;
    case 'price-desc':
      products.sort((a, b) => (parseFloat(b.price) || 0) - (parseFloat(a.price) || 0));
      break;
    case 'name-asc':
      products.sort((a, b) => (a.name || '').localeCompare(b.name || ''));
      break;
    case 'name-desc':
      products.sort((a, b) => (b.name || '').localeCompare(a.name || ''));
      break;
  }

  // Count
  countEl.innerHTML = products.length > 0
    ? '<strong>' + products.length + '</strong> produk ditemukan'
    : '';

  // Render
  if (products.length === 0) {
    gridEl.innerHTML = '';
    emptyEl.style.display = 'block';
    if (term) {
      emptyMsgEl.textContent = 'Tidak ada produk yang cocok dengan pencarian "' + term + '"';
    } else {
      emptyMsgEl.textContent = 'Belum ada produk dalam kategori ini';
    }
    return;
  }

  emptyEl.style.display = 'none';
  gridEl.innerHTML = products.map(function(p) {
    var img = p.image || 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&q=75&auto=format&fit=crop';
    var priceHtml = p.price_fmt
      ? '<span class="cmo-card__price">' + escHtml(p.price_fmt) + '</span>'
      : '<span class="cmo-card__price-na">Hubungi untuk harga</span>';
    var badgeHtml = p.badge
      ? '<span class="cmo-card__badge">' + escHtml(p.badge) + '</span>'
      : (p.is_featured ? '<span class="cmo-card__badge">Unggulan</span>' : '');
    var availHtml = '<span class="cmo-card__avail ' + (p.is_available ? 'yes' : 'no') + '"></span>';
    var specsHtml = '';
    if (p.material) {
      specsHtml += '<span class="cmo-card__spec"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 22h20"/><path d="M4 22V8l8-5 8 5v14"/><path d="M12 3v19"/></svg>' + escHtml(p.material) + '</span>';
    }
    if (p.dimensions) {
      specsHtml += '<span class="cmo-card__spec"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 8 3 3 8 3"/><line x1="3" y1="3" x2="9" y2="9"/><polyline points="21 16 21 21 16 21"/><line x1="21" y1="21" x2="15" y2="15"/></svg>' + escHtml(p.dimensions) + '</span>';
    }
    var descHtml = p.description
      ? '<p class="cmo-card__desc">' + escHtml(p.description) + '</p>'
      : '';
    var waMsg = 'Halo ALL FURNITURE, saya tertarik dengan produk "' + (p.name || '') + '" dari kategori "' + (currentCat ? currentCat.name : '') + '". Mohon informasi lebih lanjut.';
    var waUrl = waBtn.href.split('?')[0] + '?text=' + encodeURIComponent(waMsg);

    return '<div class="cmo-card" data-product-name="' + escAttr(p.name || '') + '">' +
      '<div class="cmo-card__img">' +
        '<img src="' + img + '" alt="' + escAttr(p.name) + '" loading="lazy" onerror="this.src=\'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&q=75&auto=format&fit=crop\'">' +
        badgeHtml + availHtml +
      '</div>' +
      '<div class="cmo-card__body">' +
        '<h3 class="cmo-card__name">' + escHtml(p.name || '') + '</h3>' +
        descHtml +
        (specsHtml ? '<div class="cmo-card__specs">' + specsHtml + '</div>' : '') +
      '</div>' +
      '<div class="cmo-card__foot">' +
        priceHtml +
        '<a href="' + waUrl + '" target="_blank" rel="noopener" class="cmo-card__wa" aria-label="Tanya harga via WhatsApp">' +
          '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>' +
          'Tanya Harga' +
        '</a>' +
      '</div>' +
    '</div>';
  }).join('');
}

/* ── HTML escape helpers ── */
function escHtml(str) {
  if (!str) return '';
  return String(str).replace(/[&<>"']/g, function(c) {
    return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
  });
}
function escAttr(str) {
  if (!str) return '';
  return String(str).replace(/"/g, '&quot;').replace(/</g, '&lt;');
}

/* ── Close modal ── */
function closeModal() {
  ov.classList.remove('open');
  document.body.style.overflow = '';
  searchEl.value = '';
  sortEl.value = 'default';
}

/* ── Bind triggers ── */
document.querySelectorAll('.cat-card[data-slug]').forEach(function(card) {
  card.addEventListener('click', function(e) {
    e.preventDefault();
    var slug = this.getAttribute('data-slug');
    var data = {
      slug: slug,
      name: this.getAttribute('data-name') || 'Kategori',
      desc: this.getAttribute('data-desc') || '',
      img:  this.getAttribute('data-img') || '',
    };
    openModal(data);
  });
});

/* ── Close events ── */
closeBtn.addEventListener('click', closeModal);
ov.addEventListener('click', function(e) {
  if (e.target === ov) closeModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape' && ov.classList.contains('open')) closeModal();
});

/* ── Search + sort events ── */
var searchTimer;
searchEl.addEventListener('input', function() {
  clearTimeout(searchTimer);
  searchTimer = setTimeout(renderProducts, 200);
});
sortEl.addEventListener('change', renderProducts);

/* ── Footer CTA: scroll to contact ── */
consultBtn.addEventListener('click', function(e) {
  e.preventDefault();
  closeModal();
  var target = document.getElementById('kontak');
  if (target) {
    var offset = (document.getElementById('navbar') || { offsetHeight: 72 }).offsetHeight + 16;
    window.scrollTo({ top: target.offsetTop - offset, behavior: 'smooth' });
  }
});

/* ════════════════════════════════════════════════════════
   PRODUCT DETAIL MODAL
   ════════════════════════════════════════════════════════ */

const pdOv     = document.getElementById('pdOverlay');
const pdClose  = document.getElementById('pdClose');
const pdMainImg= document.getElementById('pdMainImg');
const pdThumbs = document.getElementById('pdThumbs');
const pdNameEl = document.getElementById('pdName');
const pdCatEl  = document.getElementById('pdCat');
const pdDescEl = document.getElementById('pdDesc');
const pdPriceEl= document.getElementById('pdPrice');
const pdPriceNa= document.getElementById('pdPriceNa');
const pdBadges = document.getElementById('pdBadges');
const pdSpecsWrap = document.getElementById('pdSpecsWrap');
const pdSpecsEl   = document.getElementById('pdSpecs');
const pdMatsWrap  = document.getElementById('pdMatsWrap');
const pdMatsEl    = document.getElementById('pdMats');
const pdWaBtn     = document.getElementById('pdWaBtn');
const pdShopeeBtn = document.getElementById('pdShopeeBtn');
const pdShopeeInfo= document.getElementById('pdShopeeInfo');

const waMainNum = '{{ $waMain }}';

function openProductDetail(product) {
  // Name + category
  pdNameEl.textContent = product.name || 'Produk';
  pdCatEl.textContent = currentCat ? currentCat.name : 'Kategori';

  // Description
  pdDescEl.textContent = product.description || '';
  pdDescEl.style.display = product.description ? 'block' : 'none';

  // Price
  if (product.price_fmt) {
    pdPriceEl.textContent = product.price_fmt;
    pdPriceEl.style.display = 'block';
    pdPriceNa.style.display = 'none';
  } else {
    pdPriceEl.style.display = 'none';
    pdPriceNa.style.display = 'block';
  }

  // Badges
  var badgesHtml = '';
  if (product.badge) badgesHtml += '<span class="pd-badge pd-badge-wood">' + escHtml(product.badge) + '</span>';
  if (product.is_featured) badgesHtml += '<span class="pd-badge pd-badge-wood">Unggulan</span>';
  badgesHtml += '<span class="pd-badge ' + (product.is_available ? 'pd-badge-avail' : 'pd-badge-soldout') + '">' + (product.is_available ? 'Tersedia' : 'Habis') + '</span>';
  pdBadges.innerHTML = badgesHtml;

  // Gallery
  var images = product.images || [];
  if (product.image) images = [{ url: product.image, alt: product.name }].concat(images.filter(function(i){ return i.url !== product.image; }));
  if (images.length === 0) images = [{ url: 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80&auto=format&fit=crop', alt: product.name }];

  pdMainImg.src = images[0].url;
  pdMainImg.alt = images[0].alt || product.name;

  // Thumbnails
  pdThumbs.innerHTML = '';
  images.forEach(function(img, idx) {
    var t = document.createElement('div');
    t.className = 'pd-thumb' + (idx === 0 ? ' active' : '');
    t.innerHTML = '<img src="' + img.url + '" alt="' + escAttr(img.alt || product.name) + '" loading="lazy">';
    t.addEventListener('click', function() {
      pdMainImg.style.opacity = '0';
      setTimeout(function() {
        pdMainImg.src = img.url;
        pdMainImg.alt = img.alt || product.name;
        pdMainImg.style.opacity = '1';
      }, 150);
      document.querySelectorAll('.pd-thumb').forEach(function(el) { el.classList.remove('active'); });
      t.classList.add('active');
    });
    pdThumbs.appendChild(t);
  });

  // Specs
  var specsHtml = '';
  if (product.material) {
    specsHtml += '<div class="pd-spec"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 22h20"/><path d="M4 22V8l8-5 8 5v14"/></svg>' + escHtml(product.material) + '</div>';
  }
  if (product.dimensions) {
    specsHtml += '<div class="pd-spec"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 8 3 3 8 3"/><line x1="3" y1="3" x2="9" y2="9"/><polyline points="21 16 21 21 16 21"/><line x1="21" y1="21" x2="15" y2="15"/></svg>' + escHtml(product.dimensions) + '</div>';
  }
  if (specsHtml) {
    pdSpecsEl.innerHTML = specsHtml;
    pdSpecsWrap.style.display = 'block';
  } else {
    pdSpecsWrap.style.display = 'none';
  }

  // Materials
  var mats = product.materials || [];
  if (mats.length > 0) {
    pdMatsEl.innerHTML = mats.map(function(m) {
      var html = '<div class="pd-material">';
      html += '<div class="pd-material-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 22h20"/><path d="M4 22V8l8-5 8 5v14"/></svg></div>';
      html += '<div class="pd-material-info">';
      html += '<div class="pd-material-name">' + escHtml(m.name || '') + '</div>';
      if (m.description) html += '<div class="pd-material-desc">' + escHtml(m.description) + '</div>';
      if (m.spec_notes) html += '<div class="pd-material-spec">' + escHtml(m.spec_notes) + '</div>';
      html += '</div></div>';
      return html;
    }).join('');
    pdMatsWrap.style.display = 'block';
  } else {
    pdMatsWrap.style.display = 'none';
  }

  // WhatsApp button
  var waMsg = 'Halo ALL FURNITURE, saya tertarik dengan produk "' + (product.name || '') + '" dari kategori "' + (currentCat ? currentCat.name : '') + '". Mohon informasi lebih lanjut.';
  pdWaBtn.href = 'https://wa.me/' + waMainNum + '?text=' + encodeURIComponent(waMsg);

  // Shopee button
  if (product.shopee_url) {
    pdShopeeBtn.href = product.shopee_url;
    pdShopeeBtn.style.display = 'inline-flex';
    var info = '';
    if (product.shopee_store_name) info += product.shopee_store_name;
    if (product.shopee_notes) info += (info ? ' • ' : '') + product.shopee_notes;
    if (info) {
      pdShopeeInfo.textContent = info;
      pdShopeeInfo.style.display = 'flex';
    } else {
      pdShopeeInfo.style.display = 'none';
    }
  } else {
    pdShopeeBtn.style.display = 'none';
    pdShopeeInfo.style.display = 'none';
  }

  // Open
  pdOv.classList.add('open');
  pdOv.scrollTop = 0;
}

function closeProductDetail() {
  pdOv.classList.remove('open');
}

pdClose.addEventListener('click', closeProductDetail);
pdOv.addEventListener('click', function(e) {
  if (e.target === pdOv) closeProductDetail();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape' && pdOv.classList.contains('open')) {
    closeProductDetail();
  } else if (e.key === 'Escape' && ov.classList.contains('open') && !pdOv.classList.contains('open')) {
    closeModal();
  } else if (e.key === 'Escape' && catsAllOvEl && catsAllOvEl.classList.contains('open') && !ov.classList.contains('open') && !pdOv.classList.contains('open')) {
    closeCatsAll();
  }
});

// Make product cards in category modal clickable
document.addEventListener('click', function(e) {
  var card = e.target.closest('.cmo-card');
  if (!card) return;
  // Find the product data from our rendered list
  var productName = card.getAttribute('data-product-name');
  if (!productName) return;

  var product = allProducts.find(function(p) { return p.name === productName; });
  if (product) openProductDetail(product);
});

})();
</script>

</body>
</html>

