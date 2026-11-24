<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title','Admin') â€” ALL FURNITURE</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   ALL FURNITURE â€” ADMIN PREMIUM DESIGN SYSTEM v3 â€” WARM LIGHT BROWN
   Palette: LightBrown #B89578 | Warm #C6A487 | Beige #D8C1AA | Cream #F3EAE0
   OffWhite #FAF9F7 | LtGrey #F1F1F1 | Border #E2DED9
   MdGrey #A6A09A | DkGrey #55514D | Charcoal #292725 | Black #171717
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */

:root{
  /* Brand â€” Light Brown palette */
  --br:        #B89578;   /* Light Brown primary   */
  --br-d:      #9A7A61;   /* Warm Brown darker     */
  --br-dd:     #7A6050;   /* Deep warm â€” used sparingly */
  --br-l:      #C6A487;   /* Warm Brown lighter    */
  --br-ll:     #D8C1AA;   /* Soft Beige Brown      */
  --br-pale:   #F3EAE0;   /* Cream                 */
  --br-xs:     #FAF6F1;   /* Warmest off-white     */
  /* Neutrals */
  --black:     #171717;
  --ch:        #292725;
  --dk:        #55514D;
  --md:        #A6A09A;
  --brd:       #E2DED9;
  --lt:        #F1F1F1;
  --soft:      #FAF9F7;
  --white:     #FFFFFF;
  /* Semantic */
  --danger:    #C62828;
  --danger-lt: #FFEBEE;
  --ok:        #2E7D32;
  --ok-lt:     #E8F5E9;
  --warn:      #E65100;
  --warn-lt:   #FFF3E0;
  /* Shadows */
  --sh-xs: 0 1px 3px rgba(0,0,0,.05);
  --sh-sm: 0 2px 8px rgba(0,0,0,.07);
  --sh-md: 0 4px 20px rgba(0,0,0,.09);
  --sh-lg: 0 8px 40px rgba(0,0,0,.11);
  --sh-br: 0 4px 20px rgba(184,149,120,.22);
  /* Radii */
  --r-xs: 4px;
  --r-sm: 8px;
  --r-md: 12px;
  --r-lg: 18px;
  --r-xl: 24px;
  /* Transitions */
  --ease: cubic-bezier(.4,0,.2,1);
  --t:    all .22s var(--ease);
  --t-sl: all .35s var(--ease);
  /* Layout */
  --sb:   260px;
  --sb-c: 68px;
  --tb:   64px;
}

/* â”€â”€ RESET â”€â”€ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{font-size:14.5px;height:100%}
body{
  font-family:'Inter',system-ui,sans-serif;
  background:var(--soft);color:var(--black);
  -webkit-font-smoothing:antialiased;
  min-height:100vh;overflow-x:hidden;
}
a{text-decoration:none;color:inherit}
button{cursor:pointer;font-family:inherit;border:none;background:none}
img{max-width:100%;display:block}
ul,ol{list-style:none}
::selection{background:var(--br);color:var(--white)}
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-thumb{background:var(--br-ll);border-radius:3px}
::-webkit-scrollbar-track{background:transparent}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   SHELL
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.shell{display:flex;min-height:100vh}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   SIDEBAR â€” dark premium
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.sidebar{
  width:var(--sb);flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--brd);
  display:flex;flex-direction:column;
  position:fixed;inset-block:0;left:0;
  z-index:700;
  transition:width var(--t-sl);
  overflow:hidden;
  box-shadow:2px 0 16px rgba(0,0,0,.06);
}

/* Collapsed */
.sidebar.col{width:var(--sb-c)}
.sidebar.col .sb-txt,
.sidebar.col .sb-grp,
.sidebar.col .sb-brand-txt{
  opacity:0;pointer-events:none;width:0;white-space:nowrap;overflow:hidden;
}
.sidebar.col .sb-link{justify-content:center;padding:.6rem;margin:.05rem .625rem}
.sidebar.col .sb-ico{margin:0}
.sidebar.col .sb-foot{justify-content:center;padding:.875rem .5rem}
.sidebar.col .sb-foot-info{display:none}
.sidebar.col .sb-foot-acts{margin-left:0}

/* Brand */
.sb-brand{
  height:var(--tb);
  display:flex;align-items:center;
  padding:0 1.125rem;gap:.75rem;
  border-bottom:1px solid var(--brd);
  flex-shrink:0;position:relative;
}
.sb-brand-icon{
  width:38px;height:38px;
  background:linear-gradient(135deg,var(--br),var(--br-d));
  border-radius:var(--r-sm);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
  box-shadow:var(--sh-br);
}
.sb-brand-icon svg{width:20px;height:20px;color:var(--white)}
.sb-brand-txt{
  transition:opacity .2s ease,width var(--t-sl);overflow:hidden;
}
.sb-brand-name{
  font-family:'Playfair Display',serif;
  font-size:1.05rem;font-weight:700;color:var(--ch);
  white-space:nowrap;line-height:1.2;
}
.sb-brand-name em{font-style:normal;color:var(--br)}
.sb-brand-sub{
  font-size:.62rem;letter-spacing:.1em;text-transform:uppercase;
  color:var(--md);margin-top:.1rem;white-space:nowrap;
}

/* Collapse button */
.sb-col-btn{
  position:absolute;right:-13px;top:calc(var(--tb) - 13px);
  width:26px;height:26px;border-radius:50%;
  background:var(--br);color:var(--white);
  display:flex;align-items:center;justify-content:center;
  border:2.5px solid var(--soft);
  transition:var(--t);z-index:10;
  box-shadow:0 2px 8px rgba(0,0,0,.25);
}
.sb-col-btn:hover{background:var(--br-d)}
.sb-col-btn svg{width:11px;height:11px;transition:transform .3s var(--ease)}
.sidebar.col .sb-col-btn svg{transform:rotate(180deg)}

/* Nav scroll */
.sb-scroll{
  flex:1;overflow-y:auto;overflow-x:hidden;padding:.875rem 0;
  scrollbar-width:thin;scrollbar-color:var(--brd) transparent;
}
.sb-scroll::-webkit-scrollbar-thumb{background:var(--brd)}

/* Group label */
.sb-grp{
  font-size:.6rem;font-weight:700;letter-spacing:.14em;
  text-transform:uppercase;color:var(--md);
  padding:.75rem 1.25rem .3rem;
  white-space:nowrap;
  transition:opacity .2s ease,width var(--t-sl);
}

/* Nav link */
.sb-link{
  display:flex;align-items:center;gap:.7rem;
  padding:.58rem .875rem .58rem .875rem;
  margin:.08rem .625rem;
  border-radius:var(--r-sm);
  font-size:.83rem;font-weight:500;
  color:var(--dk);
  transition:var(--t);position:relative;
  white-space:nowrap;
}
.sb-link:hover{
  background:var(--br-xs);
  color:var(--br-d);
}
.sb-link.act{
  background:linear-gradient(90deg,var(--br-pale),rgba(243,234,224,.4));
  color:var(--br-d);font-weight:600;
  border-left:2.5px solid var(--br);
  padding-left:calc(.875rem - 2.5px);
}
.sb-ico{
  width:32px;height:32px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  border-radius:var(--r-xs);
  transition:background .2s ease,color .2s ease;
  flex-shrink:0;
}
.sb-ico svg{width:15px;height:15px}
.sb-link:hover .sb-ico{background:var(--br-pale);color:var(--br)}
.sb-link.act .sb-ico{
  background:linear-gradient(135deg,var(--br),var(--br-d));
  color:var(--white);
  box-shadow:0 2px 8px rgba(184,149,120,.3);
}
.sb-txt{
  flex:1;overflow:hidden;
  transition:opacity .2s ease,width var(--t-sl);
}

/* Badge */
.sb-bdg{
  background:var(--br);color:var(--white);
  font-size:.6rem;font-weight:700;
  padding:.1rem .42rem;border-radius:10px;
  line-height:1.5;flex-shrink:0;
}

/* Tooltip collapsed */
.sb-tip{
  position:absolute;left:calc(var(--sb-c) + 6px);
  background:var(--ch);color:var(--white);
  font-size:.73rem;font-weight:500;
  padding:.35rem .75rem;border-radius:var(--r-sm);
  white-space:nowrap;pointer-events:none;
  opacity:0;transform:translateX(-6px);
  transition:opacity .18s ease,transform .18s ease;
  z-index:800;box-shadow:var(--sh-md);
  border:1px solid rgba(0,0,0,.1);
}
.sb-tip::before{
  content:'';position:absolute;left:-5px;top:50%;transform:translateY(-50%);
  border:4px solid transparent;border-right-color:var(--ch);
}
.sidebar.col .sb-link:hover .sb-tip{opacity:1;transform:translateX(0)}

/* Footer */
.sb-foot{
  border-top:1px solid var(--brd);
  padding:1rem 1.125rem;
  display:flex;align-items:center;gap:.75rem;
  flex-shrink:0;transition:padding var(--t-sl);
  background:var(--br-xs);
}
.sb-av{
  width:34px;height:34px;border-radius:50%;
  background:linear-gradient(135deg,var(--br),var(--br-d));
  color:var(--white);
  display:flex;align-items:center;justify-content:center;
  font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;
  flex-shrink:0;overflow:hidden;
  box-shadow:0 0 0 2px var(--br-pale);
}
.sb-av img{width:100%;height:100%;object-fit:cover}
.sb-foot-info{flex:1;min-width:0}
.sb-foot-name{
  font-size:.82rem;font-weight:600;color:var(--ch);
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:130px;
}
.sb-foot-role{font-size:.68rem;color:var(--md)}
.sb-foot-acts{display:flex;gap:.25rem;margin-left:auto;flex-shrink:0}
.sb-foot-btn{
  width:28px;height:28px;border-radius:var(--r-xs);
  display:flex;align-items:center;justify-content:center;
  color:var(--md);transition:var(--t);
}
.sb-foot-btn:hover{
  background:var(--br-pale);color:var(--br-d);
}
.sb-foot-btn svg{width:13px;height:13px}

/* Mobile overlay */
.sb-overlay{
  display:none;position:fixed;inset:0;
  background:rgba(0,0,0,.55);z-index:690;
  backdrop-filter:blur(3px);
}
.sb-overlay.show{display:block}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   TOPBAR
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.topbar{
  position:fixed;top:0;
  left:var(--sb);right:0;height:var(--tb);
  background:rgba(255,255,255,.96);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--brd);
  display:flex;align-items:center;
  padding:0 1.75rem;gap:1rem;
  z-index:600;
  transition:left var(--t-sl);
  box-shadow:0 1px 0 rgba(0,0,0,.04);
}
.topbar.col{left:var(--sb-c)}

.tb-burger{
  display:none;width:36px;height:36px;
  align-items:center;justify-content:center;
  border-radius:var(--r-sm);color:var(--dk);
  transition:var(--t);flex-shrink:0;
}
.tb-burger:hover{background:var(--lt)}
.tb-burger svg{width:18px;height:18px}

.tb-page{flex:1;min-width:0}
.tb-title{
  font-family:'Playfair Display',serif;
  font-size:1.1rem;font-weight:700;color:var(--ch);
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
}
.tb-sub{font-size:.72rem;color:var(--md);margin-top:.05rem}

.tb-right{display:flex;align-items:center;gap:.5rem;flex-shrink:0}

.tb-btn{
  height:32px;padding:0 .875rem;
  border-radius:var(--r-sm);font-size:.78rem;font-weight:500;
  display:inline-flex;align-items:center;gap:.4rem;
  transition:var(--t);white-space:nowrap;
  color:var(--dk);border:1px solid var(--brd);background:var(--white);
}
.tb-btn:hover{background:var(--br-xs);border-color:var(--br-ll);color:var(--br-d)}
.tb-btn svg{width:13px;height:13px}

.tb-notif{
  position:relative;width:34px;height:34px;
  border-radius:var(--r-sm);display:flex;align-items:center;
  justify-content:center;color:var(--md);
  transition:var(--t);
}
.tb-notif:hover{background:var(--lt);color:var(--dk)}
.tb-notif svg{width:16px;height:16px}
.tb-dot{
  position:absolute;top:7px;right:7px;
  width:7px;height:7px;border-radius:50%;
  background:var(--br);border:2px solid var(--white);
}

.tb-profile{
  display:flex;align-items:center;gap:.55rem;
  padding:.3rem .625rem;border-radius:var(--r-sm);
  border:1px solid var(--brd);background:var(--white);
  transition:var(--t);cursor:default;
}
.tb-profile:hover{border-color:var(--br-ll);background:var(--br-xs)}
.tb-pav{
  width:26px;height:26px;border-radius:50%;
  background:linear-gradient(135deg,var(--br),var(--br-d));
  color:var(--white);
  display:flex;align-items:center;justify-content:center;
  font-family:'Playfair Display',serif;font-size:.75rem;font-weight:700;
  flex-shrink:0;
}
.tb-pname{font-size:.78rem;font-weight:600;color:var(--ch)}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   MAIN CONTENT
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.main{
  margin-left:var(--sb);
  padding-top:var(--tb);
  min-height:100vh;
  display:flex;flex-direction:column;
  transition:margin-left var(--t-sl);
  flex:1;
}
.main.col{margin-left:var(--sb-c)}

.main-body{padding:1.75rem;flex:1}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   FLASH MESSAGES
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.flash-wrap{padding:1.25rem 1.75rem 0}
.flash{
  display:flex;align-items:flex-start;gap:.75rem;
  padding:.875rem 1.125rem;border-radius:var(--r-md);
  font-size:.84rem;line-height:1.5;
  animation:flashIn .3s var(--ease);
  position:relative;
}
@keyframes flashIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:none}}
.flash-ok  {background:var(--ok-lt); border:1px solid #a5d6a7;color:var(--ok)}
.flash-err {background:var(--danger-lt);border:1px solid #ef9a9a;color:var(--danger)}
.flash-wrn {background:var(--warn-lt);border:1px solid #ffcc80;color:var(--warn)}
.flash svg{width:15px;height:15px;flex-shrink:0;margin-top:1px}
.flash-x{
  position:absolute;right:.75rem;top:.75rem;
  width:20px;height:20px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  opacity:.5;transition:opacity .2s;background:transparent;
}
.flash-x:hover{opacity:1}
.flash-x svg{width:10px;height:10px}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   PAGE HEADER
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.ph{
  display:flex;align-items:flex-start;
  justify-content:space-between;
  gap:1rem;margin-bottom:1.5rem;flex-wrap:wrap;
}
.ph-title{
  font-family:'Playfair Display',serif;
  font-size:1.35rem;font-weight:700;color:var(--ch);
}
.ph-sub{font-size:.8rem;color:var(--md);margin-top:.2rem}
.ph-acts{display:flex;align-items:center;gap:.625rem;flex-wrap:wrap}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   BUTTONS
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.btn{
  display:inline-flex;align-items:center;gap:.45rem;
  font-family:'Inter',sans-serif;font-size:.82rem;font-weight:600;
  letter-spacing:.01em;
  padding:.625rem 1.25rem;
  border-radius:var(--r-sm);
  border:1.5px solid transparent;
  transition:var(--t);white-space:nowrap;
  line-height:1;cursor:pointer;position:relative;overflow:hidden;
}
.btn::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.12),transparent);
  transform:translateX(-100%);transition:transform .4s ease;
}
.btn:hover::after{transform:translateX(100%)}
.btn svg{width:14px;height:14px;flex-shrink:0}

.btn-p{background:linear-gradient(135deg,var(--br),var(--br-d));color:var(--white);border-color:transparent;box-shadow:var(--sh-br)}
.btn-p:hover{background:linear-gradient(135deg,var(--br-d),var(--br-dd));transform:translateY(-1px);box-shadow:0 6px 20px rgba(184,149,120,.3)}

.btn-s{background:var(--white);color:var(--dk);border-color:var(--brd)}
.btn-s:hover{border-color:var(--br-ll);background:var(--br-xs);color:var(--br-d)}

.btn-g{background:transparent;color:var(--br);border-color:var(--br)}
.btn-g:hover{background:var(--br);color:var(--white)}

.btn-d{background:var(--danger-lt);color:var(--danger);border-color:#ef9a9a}
.btn-d:hover{background:#ffcdd2;border-color:#e57373}

.btn-sm{padding:.425rem .875rem;font-size:.76rem}
.btn-xs{padding:.3rem .625rem;font-size:.72rem;border-radius:var(--r-xs)}
.btn-ico{padding:.5rem;min-width:30px;min-height:30px;justify-content:center}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   CARD
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.card{
  background:var(--white);border-radius:var(--r-md);
  border:1px solid var(--brd);
  box-shadow:var(--sh-xs);
  transition:box-shadow .2s ease;
}
.card-hd{
  padding:1rem 1.375rem;
  border-bottom:1px solid #f0f0f0;
  display:flex;align-items:center;justify-content:space-between;
  gap:1rem;flex-wrap:wrap;
}
.card-hd-t{
  font-size:.88rem;font-weight:600;color:var(--ch);
  display:flex;align-items:center;gap:.5rem;
}
.card-hd-t svg{width:15px;height:15px;color:var(--br)}
.card-bd{padding:1.375rem}
.card-ft{
  padding:.875rem 1.375rem;
  border-top:1px solid #f0f0f0;
  background:var(--soft);border-radius:0 0 var(--r-md) var(--r-md);
}

/* STAT CARD */
.sc{
  background:var(--white);border-radius:var(--r-md);
  border:1px solid var(--brd);
  padding:1.375rem 1.25rem;
  display:flex;align-items:flex-start;gap:1rem;
  transition:var(--t);cursor:default;
  box-shadow:var(--sh-xs);
  position:relative;overflow:hidden;
}
.sc::before{
  content:'';position:absolute;
  top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--br),var(--br-l));
  opacity:0;transition:opacity .25s ease;
}
.sc:hover{transform:translateY(-3px);box-shadow:var(--sh-md);border-color:var(--br-ll)}
.sc:hover::before{opacity:1}
.sc-ico{
  width:46px;height:46px;border-radius:var(--r-md);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.sc-ico svg{width:22px;height:22px}
.sc-ico-br {background:linear-gradient(135deg,var(--br-pale),var(--br-xs));color:var(--br)}
.sc-ico-dk {background:linear-gradient(135deg,#ede8e2,#e2dbd3);color:var(--br-d)}
.sc-ico-ch {background:linear-gradient(135deg,#eceae7,#e0deda);color:var(--dk)}
.sc-ico-red{background:linear-gradient(135deg,#ffebee,#fce4ec);color:var(--danger)}
.sc-val{
  font-family:'Playfair Display',serif;
  font-size:1.8rem;font-weight:700;
  color:var(--ch);line-height:1;
  display:block;margin-bottom:.3rem;
}
.sc-lbl{font-size:.78rem;color:var(--md);font-weight:500}
.sc-meta{
  font-size:.72rem;color:var(--br);font-weight:600;
  margin-top:.45rem;display:flex;align-items:center;gap:.3rem;
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   QUICK ACTION CARD
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.qa{
  display:flex;flex-direction:column;gap:.75rem;
  padding:1.25rem;border:1.5px solid var(--brd);
  border-radius:var(--r-md);background:var(--white);
  text-decoration:none;transition:var(--t);
  box-shadow:var(--sh-xs);
}
.qa:hover{
  border-color:var(--br);background:var(--br-xs);
  transform:translateY(-3px);box-shadow:var(--sh-md);
}
.qa-ico{
  width:44px;height:44px;border-radius:var(--r-sm);
  background:linear-gradient(135deg,var(--br-pale),#f5ede8);
  display:flex;align-items:center;justify-content:center;
  color:var(--br);transition:var(--t);
}
.qa:hover .qa-ico{
  background:linear-gradient(135deg,var(--br),var(--br-d));
  color:var(--white);box-shadow:var(--sh-br);
}
.qa-t{font-size:.84rem;font-weight:700;color:var(--ch)}
.qa-s{font-size:.75rem;color:var(--md);line-height:1.4;margin-top:.1rem}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   TABLE
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.tbl-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
table{width:100%;border-collapse:collapse;font-size:.84rem}
thead tr{background:linear-gradient(90deg,var(--br-pale),var(--br-xs))}
th{
  text-align:left;padding:.75rem 1rem;
  font-size:.68rem;font-weight:700;letter-spacing:.09em;
  text-transform:uppercase;color:var(--br-d);
  border-bottom:2px solid var(--br-ll);
  white-space:nowrap;
}
td{
  padding:.875rem 1rem;color:var(--dk);
  border-bottom:1px solid #f5f3f1;
  vertical-align:middle;
}
tr:last-child td{border-bottom:none}
tbody tr{transition:background .15s ease}
tbody tr:hover{background:var(--br-xs)}
.td-b{font-weight:600;color:var(--ch)}
.td-m{color:var(--md);font-size:.78rem}

/* ROW ACTIONS */
.row-acts{display:flex;gap:.3rem;flex-wrap:nowrap}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   STATUS BADGES
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.bdg{
  display:inline-flex;align-items:center;gap:.3rem;
  font-size:.68rem;font-weight:700;letter-spacing:.04em;
  padding:.25rem .65rem;border-radius:20px;
  text-transform:uppercase;white-space:nowrap;
}
.bdg::before{
  content:'';width:5px;height:5px;
  border-radius:50%;background:currentColor;
  display:inline-block;flex-shrink:0;
}
.bdg-ok  {background:#e8f5e9;color:#2e7d32}
.bdg-off {background:var(--lt);color:var(--md)}
.bdg-new {background:var(--br-pale);color:var(--br-d)}
.bdg-pro {background:#fff3e0;color:var(--warn)}
.bdg-done{background:#e8f5e9;color:var(--ok)}
.bdg-ext {background:#f3e5f5;color:#7b1fa2}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   FORMS
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.fg{margin-bottom:0}
.fg-2{display:grid;grid-template-columns:1fr 1fr;gap:1.125rem}
.fg-1{display:grid;grid-template-columns:1fr;gap:1.125rem}
.fg-3{display:grid;grid-template-columns:repeat(3,1fr);gap:1.125rem}
.fg-full{grid-column:1/-1}

.lbl{
  display:block;font-size:.78rem;font-weight:600;
  color:var(--dk);margin-bottom:.4rem;letter-spacing:.01em;
}
.req{color:var(--br)}

.fi,.fs,.ft{
  width:100%;padding:.7rem .9rem;
  font-family:'Inter',sans-serif;font-size:.84rem;
  color:var(--ch);background:var(--white);
  border:1.5px solid var(--brd);border-radius:var(--r-sm);
  outline:none;transition:border-color .2s ease,box-shadow .2s ease;
  -webkit-appearance:none;
}
.fi::placeholder,.ft::placeholder{color:var(--md)}
.fi:focus,.fs:focus,.ft:focus{
  border-color:var(--br);
  box-shadow:0 0 0 3px rgba(184,149,120,.1);
}
.fi.err,.fs.err,.ft.err{border-color:var(--danger);box-shadow:0 0 0 3px rgba(198,40,40,.07)}
.fs{
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%239e9e9e' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat:no-repeat;background-position:right .9rem center;
  padding-right:2.25rem;
}
.ft{min-height:96px;resize:vertical;line-height:1.6}
.f-err{font-size:.74rem;color:var(--danger);margin-top:.3rem;display:flex;align-items:center;gap:.25rem}
.f-hint{font-size:.73rem;color:var(--md);margin-top:.3rem}
.f-chk{display:flex;align-items:center;gap:.5rem;cursor:pointer;padding:.4rem 0}
.f-chk input[type=checkbox]{width:15px;height:15px;accent-color:var(--br);cursor:pointer;flex-shrink:0}
.f-chk-lbl{font-size:.82rem;color:var(--dk)}

/* File zone */
.fz{
  border:2px dashed var(--brd);border-radius:var(--r-md);
  padding:1.5rem;text-align:center;
  background:var(--soft);transition:border-color .2s,background .2s;
  cursor:pointer;
}
.fz:hover,.fz.drag{border-color:var(--br);background:var(--br-xs)}
.fz input{display:none}
.fz-ico{
  width:36px;height:36px;
  background:var(--br-pale);border-radius:var(--r-sm);
  display:flex;align-items:center;justify-content:center;
  margin:0 auto .75rem;color:var(--br);
}
.fz-ico svg{width:18px;height:18px}
.fz-t{font-size:.82rem;color:var(--md)}
.fz-t strong{color:var(--br)}
.fz-preview{display:flex;flex-wrap:wrap;gap:.625rem;margin-top:1rem}
.fz-thumb{
  width:76px;height:76px;border-radius:var(--r-sm);
  overflow:hidden;border:1.5px solid var(--brd);position:relative;
}
.fz-thumb img{width:100%;height:100%;object-fit:cover}
.fz-rm{
  position:absolute;top:2px;right:2px;
  width:17px;height:17px;border-radius:50%;
  background:rgba(0,0,0,.65);color:var(--white);
  display:flex;align-items:center;justify-content:center;
  font-size:.55rem;cursor:pointer;transition:background .2s;
}
.fz-rm:hover{background:var(--danger)}

/* Section heading inside form */
.f-sec{
  font-size:.68rem;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:var(--br-l);
  padding-bottom:.75rem;
  border-bottom:1px solid var(--br-pale);
  grid-column:1/-1;margin-bottom:.25rem;
}

/* Img current preview */
.img-cur{
  display:flex;align-items:center;gap:.875rem;
  padding:.75rem;background:var(--soft);
  border:1px solid var(--brd);border-radius:var(--r-sm);
  margin-bottom:.75rem;
}
.img-cur-th{
  width:52px;height:52px;border-radius:var(--r-xs);
  overflow:hidden;flex-shrink:0;
}
.img-cur-th img{width:100%;height:100%;object-fit:cover}
.img-cur-n{font-size:.78rem;font-weight:600;color:var(--dk)}
.img-cur-h{font-size:.72rem;color:var(--md)}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   EMPTY STATE
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.empty{padding:4rem 2rem;text-align:center}
.empty-ico{
  width:64px;height:64px;border-radius:var(--r-lg);
  background:linear-gradient(135deg,var(--br-pale),var(--lt));
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 1.25rem;color:var(--br-ll);
}
.empty-ico svg{width:28px;height:28px}
.empty-t{font-size:.95rem;font-weight:700;color:var(--ch);margin-bottom:.4rem}
.empty-s{font-size:.82rem;color:var(--md);max-width:300px;margin:0 auto 1.25rem;line-height:1.6}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   PAGINATION
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.pag{display:flex;align-items:center;gap:.35rem;flex-wrap:wrap}
.pag a,.pag span{
  display:inline-flex;align-items:center;justify-content:center;
  width:30px;height:30px;border-radius:var(--r-sm);
  font-size:.78rem;font-weight:500;
  border:1px solid var(--brd);background:var(--white);color:var(--dk);
  transition:var(--t);
}
.pag a:hover{border-color:var(--br);color:var(--br);background:var(--br-xs)}
.pag .active span{
  background:linear-gradient(135deg,var(--br),var(--br-d));
  color:var(--white);border-color:transparent;
  box-shadow:var(--sh-br);
}
.pag .disabled span{opacity:.35;cursor:not-allowed}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   CONFIRM DIALOG
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.dlg-ov{
  display:none;position:fixed;inset:0;z-index:900;
  background:rgba(0,0,0,.5);backdrop-filter:blur(4px);
  align-items:center;justify-content:center;padding:1rem;
}
.dlg-ov.open{display:flex}
.dlg{
  background:var(--white);border-radius:var(--r-lg);
  padding:2rem 2rem 1.75rem;
  max-width:420px;width:100%;
  box-shadow:var(--sh-lg);
  text-align:center;
  animation:dlgIn .25s var(--ease);
}
@keyframes dlgIn{from{opacity:0;transform:scale(.93) translateY(10px)}to{opacity:1;transform:none}}
.dlg-ico{
  width:54px;height:54px;
  background:var(--danger-lt);border-radius:50%;
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 1rem;color:var(--danger);
}
.dlg-ico svg{width:22px;height:22px}
.dlg-t{font-size:1rem;font-weight:700;color:var(--ch);margin-bottom:.45rem}
.dlg-s{font-size:.84rem;color:var(--md);margin-bottom:1.5rem;line-height:1.6}
.dlg-acts{display:flex;gap:.75rem;justify-content:center}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   FILTER BAR
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.fbar{
  display:flex;gap:.75rem;flex-wrap:wrap;
  align-items:flex-end;
  padding:1rem 1.375rem;
  border-bottom:1px solid #f0f0f0;
  background:linear-gradient(90deg,var(--soft),var(--white));
}
.fbar-srch{
  position:relative;flex:1;min-width:180px;max-width:300px;
}
.fbar-srch svg{
  position:absolute;left:.75rem;top:50%;transform:translateY(-50%);
  width:14px;height:14px;color:var(--md);pointer-events:none;
}
.fbar-srch input{
  width:100%;padding:.6rem .9rem .6rem 2.2rem;
  border:1.5px solid var(--brd);border-radius:var(--r-sm);
  font-size:.82rem;color:var(--ch);outline:none;
  transition:border-color .2s;background:var(--white);
}
.fbar-srch input:focus{border-color:var(--br)}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   MISC UTILITIES
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
.sr-only{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)}
.hide-sm{@media(max-width:640px){display:none!important}}
code-tag{
  font-size:.74rem;background:var(--lt);
  padding:.2rem .5rem;border-radius:4px;color:var(--br-d);
  font-family:monospace;
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   RESPONSIVE
   â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
@media(max-width:1024px){
  .sidebar{transform:translateX(-100%);width:var(--sb)!important;box-shadow:var(--sh-lg)}
  .sidebar.mob-open{transform:translateX(0)}
  .sidebar.col .sb-txt,
  .sidebar.col .sb-grp,
  .sidebar.col .sb-brand-txt{opacity:1;pointer-events:auto;width:auto;white-space:nowrap;overflow:visible}
  .sidebar.col .sb-link{justify-content:flex-start;padding:.58rem .875rem;margin:.08rem .625rem}
  .sidebar.col .sb-foot{justify-content:flex-start;padding:1rem 1.125rem}
  .sidebar.col .sb-foot-info{display:block}
  .sidebar.col .sb-foot-acts{margin-left:auto}
  .sb-col-btn{display:none}
  .tb-burger{display:flex}
  .main,.topbar{margin-left:0!important;left:0!important}
}
@media(max-width:640px){
  .main-body{padding:1rem}
  .flash-wrap{padding:.875rem 1rem 0}
  .fg-2,.fg-3{grid-template-columns:1fr!important}
  .ph{flex-direction:column}
  .sc{padding:1rem}
  .sc-val{font-size:1.5rem}
  .tb-pname{display:none}
  .topbar{padding:0 1rem}
  .card-hd{flex-direction:column;align-items:flex-start}
}
</style>
</head>
<body>
<div class="shell">

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     SIDEBAR
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi admin">

  {{-- Brand --}}
  <div class="sb-brand">
    <div class="sb-brand-icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
        <polyline points="9 22 9 12 15 12 15 22"/>
      </svg>
    </div>
    <div class="sb-brand-txt">
      <div class="sb-brand-name"><em>ALL</em> FURNITURE</div>
      <div class="sb-brand-sub">Admin Panel</div>
    </div>
    <button class="sb-col-btn" id="colBtn" aria-label="Collapse sidebar">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M15 18l-6-6 6-6"/>
      </svg>
    </button>
  </div>

  {{-- Navigation --}}
  <nav class="sb-scroll" id="sbNav">

    {{-- Dashboard --}}
    <div class="sb-grp">Utama</div>
    <a href="{{ route('admin.dashboard') }}"
       class="sb-link {{ request()->is('admin/dashboard') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
          <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
        </svg>
      </span>
      <span class="sb-txt">Dashboard</span>
      <span class="sb-tip">Dashboard</span>
    </a>

    {{-- Konten --}}
    <div class="sb-grp">Konten</div>

    <a href="{{ route('categories.index') }}"
       class="sb-link {{ request()->is('admin/categories*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/>
        </svg>
      </span>
      <span class="sb-txt">Kategori</span>
      <span class="sb-tip">Kategori</span>
    </a>

    <a href="{{ route('products.index') }}"
       class="sb-link {{ request()->is('admin/products*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="2" y="7" width="20" height="14" rx="2"/>
          <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
        </svg>
      </span>
      <span class="sb-txt">Produk</span>
      <span class="sb-tip">Produk</span>
    </a>

    <a href="{{ route('projects.index') }}"
       class="sb-link {{ request()->is('admin/projects*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="18" height="18" rx="2"/>
          <path d="M9 3v18"/><path d="M3 9h6"/><path d="M3 15h6"/>
        </svg>
      </span>
      <span class="sb-txt">Proyek / Portfolio</span>
      <span class="sb-tip">Proyek</span>
    </a>

    <a href="{{ route('testimonials.index') }}"
       class="sb-link {{ request()->is('admin/testimonials*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
        </svg>
      </span>
      <span class="sb-txt">Testimoni</span>
      <span class="sb-tip">Testimoni</span>
    </a>

    <a href="{{ route('faqs.index') }}"
       class="sb-link {{ request()->is('admin/faqs*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/>
          <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/>
          <line x1="12" y1="17" x2="12.01" y2="17"/>
        </svg>
      </span>
      <span class="sb-txt">FAQ</span>
      <span class="sb-tip">FAQ</span>
    </a>

    {{-- Pengaturan --}}
    <div class="sb-grp">Pengaturan</div>

    <a href="{{ route('company-features.index') }}"
       class="sb-link {{ request()->is('admin/company-features*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
        </svg>
      </span>
      <span class="sb-txt">Keunggulan</span>
      <span class="sb-tip">Keunggulan</span>
    </a>

    <a href="{{ route('ordering-steps.index') }}"
       class="sb-link {{ request()->is('admin/ordering-steps*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="8" y1="6" x2="21" y2="6"/>
          <line x1="8" y1="12" x2="21" y2="12"/>
          <line x1="8" y1="18" x2="21" y2="18"/>
          <line x1="3" y1="6" x2="3.01" y2="6"/>
          <line x1="3" y1="12" x2="3.01" y2="12"/>
          <line x1="3" y1="18" x2="3.01" y2="18"/>
        </svg>
      </span>
      <span class="sb-txt">Cara Pemesanan</span>
      <span class="sb-tip">Cara Pemesanan</span>
    </a>

    <a href="{{ route('navigation.index') }}"
       class="sb-link {{ request()->is('admin/navigation*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </span>
      <span class="sb-txt">Navigasi</span>
      <span class="sb-tip">Navigasi</span>
    </a>

    <a href="{{ route('social-links.index') }}"
       class="sb-link {{ request()->is('admin/social-links*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
          <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
          <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
        </svg>
      </span>
      <span class="sb-txt">Social Links</span>
      <span class="sb-tip">Social Links</span>
    </a>

    <a href="{{ route('admin.settings') }}"
       class="sb-link {{ request()->is('admin/settings*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="3"/>
          <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
        </svg>
      </span>
      <span class="sb-txt">Pengaturan Situs</span>
      <span class="sb-tip">Pengaturan</span>
    </a>

    {{-- Pesan --}}
    <div class="sb-grp">Pesan</div>

    <a href="{{ route('admin.messages') }}"
       class="sb-link {{ request()->is('admin/contact-messages*') ? 'act' : '' }}">
      <span class="sb-ico" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
          <polyline points="22,6 12,13 2,6"/>
        </svg>
      </span>
      <span class="sb-txt">Pesan Masuk</span>
      @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
      @if($unread > 0)
        <span class="sb-bdg">{{ $unread > 99 ? '99+' : $unread }}</span>
      @endif
      <span class="sb-tip">Pesan Masuk</span>
    </a>

  </nav>

  {{-- Profile footer --}}
  <div class="sb-foot">
    @php $initials = strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)); @endphp
    <div class="sb-av">{{ $initials }}</div>
    <div class="sb-foot-info">
      <div class="sb-foot-name">{{ auth()->user()->name ?? 'Admin' }}</div>
      <div class="sb-foot-role">Administrator</div>
    </div>
    <div class="sb-foot-acts">
      <a href="{{ route('admin.profile') }}" class="sb-foot-btn" title="Profil">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </a>
      <form method="POST" action="{{ route('admin.logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="sb-foot-btn" title="Keluar">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
          </svg>
        </button>
      </form>
    </div>
  </div>
</aside>

{{-- Mobile overlay --}}
<div class="sb-overlay" id="sbOverlay"></div>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     TOPBAR
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<header class="topbar" id="topbar" role="banner">
  <button class="tb-burger" id="burgerBtn" aria-label="Buka menu" aria-expanded="false">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <line x1="3" y1="6" x2="21" y2="6"/>
      <line x1="3" y1="12" x2="21" y2="12"/>
      <line x1="3" y1="18" x2="21" y2="18"/>
    </svg>
  </button>

  <div class="tb-page">
    <div class="tb-title">@yield('page-title','Dashboard')</div>
    @hasSection('page-subtitle')
      <div class="tb-sub">@yield('page-subtitle')</div>
    @endif
  </div>

  <div class="tb-right">
    @php $unreadTop = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
    @if($unreadTop > 0)
    <a href="{{ route('admin.messages') }}" class="tb-notif" title="{{ $unreadTop }} pesan belum dibaca">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/>
        <path d="M13.73 21a2 2 0 01-3.46 0"/>
      </svg>
      <span class="tb-dot"></span>
    </a>
    @endif

    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="tb-btn">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
        <polyline points="15 3 21 3 21 9"/>
        <line x1="10" y1="14" x2="21" y2="3"/>
      </svg>
      <span>Lihat Website</span>
    </a>

    <div class="tb-profile">
      <div class="tb-pav">{{ $initials ?? strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}</div>
      <span class="tb-pname">{{ auth()->user()->name ?? 'Admin' }}</span>
    </div>
  </div>
</header>

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     MAIN CONTENT
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<div class="main" id="main">

  {{-- Flash messages --}}
  <div class="flash-wrap" id="flashWrap">
    @if(session('success'))
    <div class="flash flash-ok" role="alert">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
      </svg>
      <span>{{ session('success') }}</span>
      <button class="flash-x" onclick="this.closest('.flash').remove()" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
          <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
      </button>
    </div>
    @endif
    @if(session('error'))
    <div class="flash flash-err" role="alert">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <line x1="15" y1="9" x2="9" y2="15"/>
        <line x1="9" y1="9" x2="15" y2="15"/>
      </svg>
      <span>{{ session('error') }}</span>
      <button class="flash-x" onclick="this.closest('.flash').remove()" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
          <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
      </button>
    </div>
    @endif
    @if(session('warning'))
    <div class="flash flash-wrn" role="alert">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
        <line x1="12" y1="9" x2="12" y2="13"/>
        <line x1="12" y1="17" x2="12.01" y2="17"/>
      </svg>
      <span>{{ session('warning') }}</span>
      <button class="flash-x" onclick="this.closest('.flash').remove()" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
          <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
      </button>
    </div>
    @endif
  </div>

  {{-- Content --}}
  <div class="main-body">@yield('content')</div>

</div>
</div>{{-- .shell --}}

{{-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     DELETE CONFIRM DIALOG
     â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• --}}
<div class="dlg-ov" id="dlgOv">
  <div class="dlg">
    <div class="dlg-ico">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="3 6 5 6 21 6"/>
        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
        <path d="M10 11v6"/><path d="M14 11v6"/>
        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
      </svg>
    </div>
    <p class="dlg-t">Hapus Data?</p>
    <p class="dlg-s" id="dlgMsg">Data akan dihapus secara permanen dan tidak dapat dipulihkan.</p>
    <div class="dlg-acts">
      <button class="btn btn-s" onclick="closeDlg()">Batal</button>
      <form id="dlgForm" method="POST" style="display:inline">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-d">Hapus Sekarang</button>
      </form>
    </div>
  </div>
</div>

@stack('scripts')
<script>
(function(){
'use strict';

/* â”€â”€ Sidebar collapse â”€â”€ */
const sb    = document.getElementById('sidebar');
const main  = document.getElementById('main');
const tb    = document.getElementById('topbar');
const colBtn= document.getElementById('colBtn');
const KEY   = 'af_sb_col';

const applyState = (isCol) => {
  sb.classList.toggle('col', isCol);
  main.classList.toggle('col', isCol);
  tb.classList.toggle('col', isCol);
};

applyState(localStorage.getItem(KEY) === '1');

colBtn?.addEventListener('click', () => {
  const now = !sb.classList.contains('col');
  applyState(now);
  localStorage.setItem(KEY, now ? '1' : '0');
});

/* â”€â”€ Mobile drawer â”€â”€ */
const burger  = document.getElementById('burgerBtn');
const overlay = document.getElementById('sbOverlay');

const openSb  = () => { sb.classList.add('mob-open'); overlay.classList.add('show'); document.body.style.overflow='hidden'; burger?.setAttribute('aria-expanded','true'); };
const closeSb = () => { sb.classList.remove('mob-open'); overlay.classList.remove('show'); document.body.style.overflow=''; burger?.setAttribute('aria-expanded','false'); };

burger?.addEventListener('click', openSb);
overlay.addEventListener('click', closeSb);
document.addEventListener('keydown', e => e.key==='Escape' && closeSb());
document.querySelectorAll('.sb-link').forEach(l => l.addEventListener('click', () => { if(window.innerWidth < 1025) closeSb(); }));

/* â”€â”€ Delete dialog â”€â”€ */
window.openDlg = (url, msg) => {
  document.getElementById('dlgForm').action = url;
  if(msg) document.getElementById('dlgMsg').textContent = msg;
  document.getElementById('dlgOv').classList.add('open');
  document.body.style.overflow = 'hidden';
};
window.closeDlg = () => {
  document.getElementById('dlgOv').classList.remove('open');
  document.body.style.overflow = '';
};
document.getElementById('dlgOv').addEventListener('click', e => { if(e.target === e.currentTarget) closeDlg(); });

/* Backwards compat alias */
window.confirmDelete = window.openDlg;

/* â”€â”€ Flash auto-dismiss â”€â”€ */
document.querySelectorAll('.flash').forEach(el => {
  setTimeout(() => {
    el.style.transition = 'opacity .4s ease, transform .4s ease';
    el.style.opacity = '0';
    el.style.transform = 'translateY(-8px)';
    setTimeout(() => el.remove(), 400);
  }, 5000);
});

/* â”€â”€ File drop zone â”€â”€ */
document.querySelectorAll('.fz').forEach(zone => {
  const input = zone.querySelector('input[type=file]');
  zone.addEventListener('click', () => input?.click());
  zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('drag'); });
  zone.addEventListener('dragleave', () => zone.classList.remove('drag'));
  zone.addEventListener('drop', e => {
    e.preventDefault(); zone.classList.remove('drag');
    if(input && e.dataTransfer.files.length) { input.files = e.dataTransfer.files; input.dispatchEvent(new Event('change')); }
  });
});

/* â”€â”€ Image preview â”€â”€ */
document.querySelectorAll('input[type=file][data-preview]').forEach(input => {
  input.addEventListener('change', function(){
    const prev = document.getElementById(this.dataset.preview);
    if(!prev) return;
    prev.innerHTML = '';
    Array.from(this.files).forEach(file => {
      if(!file.type.startsWith('image/')) return;
      const r = new FileReader();
      r.onload = e => {
        const d = document.createElement('div');
        d.className = 'fz-thumb';
        d.innerHTML = `<img src="${e.target.result}" alt=""><span class="fz-rm" onclick="this.closest('.fz-thumb').remove()">âœ•</span>`;
        prev.appendChild(d);
      };
      r.readAsDataURL(file);
    });
  });
});

})();
</script>
</body>
</html>

