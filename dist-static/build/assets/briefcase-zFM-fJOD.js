import{b5 as n}from"./app-DHOdf3IV.js";/**
 * @license lucide-vue-next v0.539.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const h=e=>e.replace(/([a-z0-9])([A-Z])/g,"$1-$2").toLowerCase(),g=e=>e.replace(/^([A-Z])|[\s-_]+(\w)/g,(t,o,r)=>r?r.toUpperCase():o.toLowerCase()),m=e=>{const t=g(e);return t.charAt(0).toUpperCase()+t.slice(1)},f=(...e)=>e.filter((t,o,r)=>!!t&&t.trim()!==""&&r.indexOf(t)===o).join(" ").trim(),u=e=>e==="";/**
 * @license lucide-vue-next v0.539.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */var s={xmlns:"http://www.w3.org/2000/svg",width:24,height:24,viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":2,"stroke-linecap":"round","stroke-linejoin":"round"};/**
 * @license lucide-vue-next v0.539.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const k=({name:e,iconNode:t,absoluteStrokeWidth:o,"absolute-stroke-width":r,strokeWidth:c,"stroke-width":a,size:i=s.width,color:w=s.stroke,...l},{slots:d})=>n("svg",{...s,...l,width:i,height:i,stroke:w,"stroke-width":u(o)||u(r)||o===!0||r===!0?Number(c||a||s["stroke-width"])*24/Number(i):c||a||s["stroke-width"],class:f("lucide",l.class,...e?[`lucide-${h(m(e))}-icon`,`lucide-${h(e)}`]:["lucide-icon"])},[...t.map(p=>n(...p)),...d.default?[d.default()]:[]]);/**
 * @license lucide-vue-next v0.539.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const C=(e,t)=>(o,{slots:r,attrs:c})=>n(k,{...c,...o,iconNode:t,name:e},r);/**
 * @license lucide-vue-next v0.539.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const v=C("briefcase",[["path",{d:"M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16",key:"jecpp"}],["rect",{width:"20",height:"14",x:"2",y:"6",rx:"2",key:"i6l2r4"}]]);export{v as B,C as c};
