/**
 * BC Math Library for Javascript
 * Ported from the PHP5 bcmath extension source code,
 * which uses the libbcmath package...
 *    Copyright (C) 1991, 1992, 1993, 1994, 1997 Free Software Foundation, Inc.
 *    Copyright (C) 2000 Philip A. Nelson
 *     The Free Software Foundation, Inc.
 *     59 Temple Place, Suite 330
 *     Boston, MA 02111-1307 USA.
 *      e-mail:  philnelson@acm.org
 *     us-mail:  Philip A. Nelson
 *               Computer Science Department, 9062
 *               Western Washington University
 *               Bellingham, WA 98226-9062
 *
 * bcmath-js homepage:
 *
 * This code is covered under the LGPL licence, and can be used however you want :)
 * Be kind and share any decent code changes.
 */
var libbcmath={PLUS:'+',MINUS:'-',BASE:10,scale:0,bc_num:function(){this.n_sign=null;this.n_len=null;this.n_scale=null;this.n_value=null;this.toString=function(){var r,tmp;tmp=this.n_value.join('');r=((this.n_sign==libbcmath.PLUS)?'':this.n_sign)+tmp.substr(0,this.n_len);if(this.n_scale>0){r+='.'+tmp.substr(this.n_len,this.n_scale);}
return r;};},bc_new_num:function(length,scale){var temp;temp=new libbcmath.bc_num();temp.n_sign=libbcmath.PLUS;temp.n_len=length;temp.n_scale=scale;temp.n_value=libbcmath.safe_emalloc(1,length+scale,0);libbcmath.memset(temp.n_value,0,0,length+scale);return temp;},safe_emalloc:function(size,len,extra){return Array((size*len)+extra);},bc_init_num:function(){return new libbcmath.bc_new_num(1,0);},_bc_rm_leading_zeros:function(num){while((num.n_value[0]===0)&&(num.n_len>1)){num.n_value.shift();num.n_len--;}},php_str2num:function(str){var p;p=str.indexOf('.');if(p==-1){return libbcmath.bc_str2num(str,0);}else{return libbcmath.bc_str2num(str,(str.length-p));}},CH_VAL:function(c){return c-'0';},BCD_CHAR:function(d){return d+'0';},isdigit:function(c){return(isNaN(parseInt(c,10))?false:true);},bc_str2num:function(str_in,scale){var str,num,ptr,digits,strscale,zero_int,nptr;str=str_in.split('');ptr=0;digits=0;strscale=0;zero_int=false;if((str[ptr]==='+')||(str[ptr]==='-')){ptr++;}
while(str[ptr]==='0'){ptr++;}
while((str[ptr])%1===0){ptr++;digits++;}
if(str[ptr]==='.'){ptr++;}
while((str[ptr])%1===0){ptr++;strscale++;}
if((str[ptr])||(digits+strscale===0)){return libbcmath.bc_init_num();}
strscale=libbcmath.MIN(strscale,scale);if(digits===0){zero_int=true;digits=1;}
num=libbcmath.bc_new_num(digits,strscale);ptr=0;if(str[ptr]==='-'){num.n_sign=libbcmath.MINUS;ptr++;}else{num.n_sign=libbcmath.PLUS;if(str[ptr]==='+'){ptr++;}}
while(str[ptr]==='0'){ptr++;}
nptr=0;if(zero_int){num.n_value[nptr++]=0;digits=0;}
for(;digits>0;digits--){num.n_value[nptr++]=libbcmath.CH_VAL(str[ptr++]);}
if(strscale>0){ptr++;for(;strscale>0;strscale--){num.n_value[nptr++]=libbcmath.CH_VAL(str[ptr++]);}}
return num;},cint:function(v){if(typeof(v)=='undefined'){v=0;}
var x=parseInt(v,10);if(isNaN(x)){x=0;}
return x;},MIN:function(a,b){return((a>b)?b:a);},MAX:function(a,b){return((a>b)?a:b);},ODD:function(a){return(a&1);},memset:function(r,ptr,chr,len){var i;for(i=0;i<len;i++){r[ptr+i]=chr;}},memcpy:function(dest,ptr,src,srcptr,len){var i;for(i=0;i<len;i++){dest[ptr+i]=src[srcptr+i];}
return true;},bc_is_zero:function(num){var count;var nptr;count=num.n_len+num.n_scale;nptr=0;while((count>0)&&(num.n_value[nptr++]===0)){count--;}
if(count!==0){return false;}else{return true;}},bc_out_of_memory:function(){throw new Error("(BC) Out of memory");}};libbcmath.bc_add=function(n1,n2,scale_min){var sum,cmp_res,res_scale;if(n1.n_sign===n2.n_sign){sum=libbcmath._bc_do_add(n1,n2,scale_min);sum.n_sign=n1.n_sign;}else{cmp_res=libbcmath._bc_do_compare(n1,n2,false,false);switch(cmp_res){case-1:sum=libbcmath._bc_do_sub(n2,n1,scale_min);sum.n_sign=n2.n_sign;break;case 0:res_scale=libbcmath.MAX(scale_min,libbcmath.MAX(n1.n_scale,n2.n_scale));sum=libbcmath.bc_new_num(1,res_scale);libbcmath.memset(sum.n_value,0,0,res_scale+1);break;case 1:sum=libbcmath._bc_do_sub(n1,n2,scale_min);sum.n_sign=n1.n_sign;}}
return sum;};libbcmath.bc_compare=function(n1,n2){return libbcmath._bc_do_compare(n1,n2,true,false);};libbcmath._bc_do_compare=function(n1,n2,use_sign,ignore_last){var n1ptr,n2ptr;var count;if(use_sign&&(n1.n_sign!=n2.n_sign)){if(n1.n_sign==libbcmath.PLUS){return(1);}else{return(-1);}}
if(n1.n_len!=n2.n_len){if(n1.n_len>n2.n_len){if(!use_sign||(n1.n_sign==libbcmath.PLUS)){return(1);}else{return(-1);}}else{if(!use_sign||(n1.n_sign==libbcmath.PLUS)){return(-1);}else{return(1);}}}
count=n1.n_len+Math.min(n1.n_scale,n2.n_scale);n1ptr=0;n2ptr=0;while((count>0)&&(n1.n_value[n1ptr]==n2.n_value[n2ptr])){n1ptr++;n2ptr++;count--;}
if(ignore_last&&(count==1)&&(n1.n_scale==n2.n_scale)){return(0);}
if(count!==0){if(n1.n_value[n1ptr]>n2.n_value[n2ptr]){if(!use_sign||n1.n_sign==libbcmath.PLUS){return(1);}else{return(-1);}}else{if(!use_sign||n1.n_sign==libbcmath.PLUS){return(-1);}else{return(1);}}}
if(n1.n_scale!=n2.n_scale){if(n1.n_scale>n2.n_scale){for(count=(n1.n_scale-n2.n_scale);count>0;count--){if(n1.n_value[n1ptr++]!==0){if(!use_sign||n1.n_sign==libbcmath.PLUS){return(1);}else{return(-1);}}}}else{for(count=(n2.n_scale-n1.n_scale);count>0;count--){if(n2.n_value[n2ptr++]!==0){if(!use_sign||n1.n_sign==libbcmath.PLUS){return(-1);}else{return(1);}}}}}
return(0);};libbcmath._one_mult=function(num,n_ptr,size,digit,result,r_ptr){var carry,value;var nptr,rptr;if(digit===0){libbcmath.memset(result,0,0,size);}else{if(digit==1){libbcmath.memcpy(result,r_ptr,num,n_ptr,size);}else{nptr=n_ptr+size-1;rptr=r_ptr+size-1;carry=0;while(size-->0){value=num[nptr--]*digit+carry;result[rptr--]=value%libbcmath.BASE;carry=Math.floor(value/libbcmath.BASE);}
if(carry!=0){result[rptr]=carry;}}}}
libbcmath.bc_divide=function(n1,n2,scale){var quot;var qval;var num1,num2;var ptr1,ptr2,n2ptr,qptr;var scale1,val;var len1,len2,scale2,qdigits,extra,count;var qdig,qguess,borrow,carry;var mval;var zero;var norm;var ptrs;if(libbcmath.bc_is_zero(n2)){return-1;}
if(libbcmath.bc_is_zero(n1)){return libbcmath.bc_new_num(1,scale);}
if(n2.n_scale===0){if(n2.n_len===1&&n2.n_value[0]===1){qval=libbcmath.bc_new_num(n1.n_len,scale);qval.n_sign=(n1.n_sign==n2.n_sign?libbcmath.PLUS:libbcmath.MINUS);libbcmath.memset(qval.n_value,n1.n_len,0,scale);libbcmath.memcpy(qval.n_value,0,n1.n_value,0,n1.n_len+libbcmath.MIN(n1.n_scale,scale));}}
scale2=n2.n_scale;n2ptr=n2.n_len+scale2-1;while((scale2>0)&&(n2.n_value[n2ptr--]===0)){scale2--;}
len1=n1.n_len+scale2;scale1=n1.n_scale-scale2;if(scale1<scale){extra=scale-scale1;}else{extra=0;}
num1=libbcmath.safe_emalloc(1,n1.n_len+n1.n_scale,extra+2);if(num1===null){libbcmath.bc_out_of_memory();}
libbcmath.memset(num1,0,0,n1.n_len+n1.n_scale+extra+2);libbcmath.memcpy(num1,1,n1.n_value,0,n1.n_len+n1.n_scale);len2=n2.n_len+scale2;num2=libbcmath.safe_emalloc(1,len2,1);if(num2===null){libbcmath.bc_out_of_memory();}
libbcmath.memcpy(num2,0,n2.n_value,0,len2);num2[len2]=0;n2ptr=0;while(num2[n2ptr]===0){n2ptr++;len2--;}
if(len2>len1+scale){qdigits=scale+1;zero=true;}else{zero=false;if(len2>len1){qdigits=scale+1;}else{qdigits=len1-len2+scale+1;}}
qval=libbcmath.bc_new_num(qdigits-scale,scale);libbcmath.memset(qval.n_value,0,0,qdigits);mval=libbcmath.safe_emalloc(1,len2,1);if(mval===null){libbcmath.bc_out_of_memory();}
if(!zero){norm=Math.floor(10/(n2.n_value[n2ptr]+1));if(norm!=1){libbcmath._one_mult(num1,0,len1+scale1+extra+1,norm,num1,0);libbcmath._one_mult(n2.n_value,n2ptr,len2,norm,n2.n_value,n2ptr);}
qdig=0;if(len2>len1){qptr=len2-len1;}else{qptr=0;}
while(qdig<=len1+scale-len2){if(n2.n_value[n2ptr]==num1[qdig]){qguess=9;}else{qguess=Math.floor((num1[qdig]*10+num1[qdig+1])/n2.n_value[n2ptr]);}
if(n2.n_value[n2ptr+1]*qguess>(num1[qdig]*10+num1[qdig+1]-n2.n_value[n2ptr]*qguess)*10+num1[qdig+2]){qguess--;if(n2.n_value[n2ptr+1]*qguess>(num1[qdig]*10+num1[qdig+1]-n2.n_value[n2ptr]*qguess)*10+num1[qdig+2]){qguess--;}}
borrow=0;if(qguess!==0){mval[0]=0;libbcmath._one_mult(n2.n_value,n2ptr,len2,qguess,mval,1);ptr1=qdig+len2;ptr2=len2;for(count=0;count<len2+1;count++){if(ptr2<0){val=num1[ptr1]-0-borrow;}else{val=num1[ptr1]-mval[ptr2--]-borrow;}
if(val<0){val+=10;borrow=1;}else{borrow=0;}
num1[ptr1--]=val;}}
if(borrow==1){qguess--;ptr1=qdig+len2;ptr2=len2-1;carry=0;for(count=0;count<len2;count++){if(ptr2<0){val=num1[ptr1]+0+carry;}else{val=num1[ptr1]+n2.n_value[ptr2--]+carry;}
if(val>9){val-=10;carry=1;}else{carry=0;}
num1[ptr1--]=val;}
if(carry==1){num1[ptr1]=(num1[ptr1]+1)%10;}}
qval.n_value[qptr++]=qguess;qdig++;}}
qval.n_sign=(n1.n_sign==n2.n_sign?libbcmath.PLUS:libbcmath.MINUS);if(libbcmath.bc_is_zero(qval)){qval.n_sign=libbcmath.PLUS;}
libbcmath._bc_rm_leading_zeros(qval);return qval;};libbcmath._bc_do_add=function(n1,n2,scale_min){var sum;var sum_scale,sum_digits;var n1ptr,n2ptr,sumptr;var carry,n1bytes,n2bytes;var tmp;sum_scale=libbcmath.MAX(n1.n_scale,n2.n_scale);sum_digits=libbcmath.MAX(n1.n_len,n2.n_len)+1;sum=libbcmath.bc_new_num(sum_digits,libbcmath.MAX(sum_scale,scale_min));n1bytes=n1.n_scale;n2bytes=n2.n_scale;n1ptr=(n1.n_len+n1bytes-1);n2ptr=(n2.n_len+n2bytes-1);sumptr=(sum_scale+sum_digits-1);if(n1bytes!=n2bytes){if(n1bytes>n2bytes){while(n1bytes>n2bytes){sum.n_value[sumptr--]=n1.n_value[n1ptr--];n1bytes--;}}else{while(n2bytes>n1bytes){sum.n_value[sumptr--]=n2.n_value[n2ptr--];n2bytes--;}}}
n1bytes+=n1.n_len;n2bytes+=n2.n_len;carry=0;while((n1bytes>0)&&(n2bytes>0)){tmp=n1.n_value[n1ptr--]+n2.n_value[n2ptr--]+carry;if(tmp>=libbcmath.BASE){carry=1;tmp-=libbcmath.BASE;}else{carry=0;}
sum.n_value[sumptr]=tmp;sumptr--;n1bytes--;n2bytes--;}
if(n1bytes===0){while(n2bytes-->0){tmp=n2.n_value[n2ptr--]+carry;if(tmp>=libbcmath.BASE){carry=1;tmp-=libbcmath.BASE;}else{carry=0;}
sum.n_value[sumptr--]=tmp;}}else{while(n1bytes-->0){tmp=n1.n_value[n1ptr--]+carry;if(tmp>=libbcmath.BASE){carry=1;tmp-=libbcmath.BASE;}else{carry=0;}
sum.n_value[sumptr--]=tmp;}}
if(carry==1){sum.n_value[sumptr]+=1;}
libbcmath._bc_rm_leading_zeros(sum);return sum;};libbcmath._bc_do_sub=function(n1,n2,scale_min){var diff;var diff_scale,diff_len;var min_scale,min_len;var n1ptr,n2ptr,diffptr;var borrow,count,val;diff_len=libbcmath.MAX(n1.n_len,n2.n_len);diff_scale=libbcmath.MAX(n1.n_scale,n2.n_scale);min_len=libbcmath.MIN(n1.n_len,n2.n_len);min_scale=libbcmath.MIN(n1.n_scale,n2.n_scale);diff=libbcmath.bc_new_num(diff_len,libbcmath.MAX(diff_scale,scale_min));n1ptr=(n1.n_len+n1.n_scale-1);n2ptr=(n2.n_len+n2.n_scale-1);diffptr=(diff_len+diff_scale-1);borrow=0;if(n1.n_scale!=min_scale){for(count=n1.n_scale-min_scale;count>0;count--){diff.n_value[diffptr--]=n1.n_value[n1ptr--];}}else{for(count=n2.n_scale-min_scale;count>0;count--){val=0-n2.n_value[n2ptr--]-borrow;if(val<0){val+=libbcmath.BASE;borrow=1;}else{borrow=0;diff.n_value[diffptr--]=val;}}}
for(count=0;count<min_len+min_scale;count++){val=n1.n_value[n1ptr--]-n2.n_value[n2ptr--]-borrow;if(val<0){val+=libbcmath.BASE;borrow=1;}else{borrow=0;}
diff.n_value[diffptr--]=val;}
if(diff_len!=min_len){for(count=diff_len-min_len;count>0;count--){val=n1.n_value[n1ptr--]-borrow;if(val<0){val+=libbcmath.BASE;borrow=1;}else{borrow=0;}
diff.n_value[diffptr--]=val;}}
libbcmath._bc_rm_leading_zeros(diff);return diff;};libbcmath.MUL_BASE_DIGITS=80;libbcmath.MUL_SMALL_DIGITS=(libbcmath.MUL_BASE_DIGITS/4);libbcmath.bc_multiply=function(n1,n2,scale){var pval;var len1,len2;var full_scale,prod_scale;len1=n1.n_len+n1.n_scale;len2=n2.n_len+n2.n_scale;full_scale=n1.n_scale+n2.n_scale;prod_scale=libbcmath.MIN(full_scale,libbcmath.MAX(scale,libbcmath.MAX(n1.n_scale,n2.n_scale)));pval=libbcmath._bc_rec_mul(n1,len1,n2,len2,full_scale);pval.n_sign=(n1.n_sign==n2.n_sign?libbcmath.PLUS:libbcmath.MINUS);pval.n_len=len2+len1+1-full_scale;pval.n_scale=prod_scale;libbcmath._bc_rm_leading_zeros(pval);if(libbcmath.bc_is_zero(pval)){pval.n_sign=libbcmath.PLUS;}
return pval;};libbcmath.new_sub_num=function(length,scale,value){var temp=new libbcmath.bc_num();temp.n_sign=libbcmath.PLUS;temp.n_len=length;temp.n_scale=scale;temp.n_value=value;return temp;};libbcmath._bc_simp_mul=function(n1,n1len,n2,n2len,full_scale){var prod;var n1ptr,n2ptr,pvptr;var n1end,n2end;var indx,sum,prodlen;prodlen=n1len+n2len+1;prod=libbcmath.bc_new_num(prodlen,0);n1end=n1len-1;n2end=n2len-1;pvptr=prodlen-1;sum=0;for(indx=0;indx<prodlen-1;indx++){n1ptr=n1end-libbcmath.MAX(0,indx-n2len+1);n2ptr=n2end-libbcmath.MIN(indx,n2len-1);while((n1ptr>=0)&&(n2ptr<=n2end)){sum+=n1.n_value[n1ptr--]*n2.n_value[n2ptr++];}
prod.n_value[pvptr--]=Math.floor(sum%libbcmath.BASE);sum=Math.floor(sum/libbcmath.BASE);}
prod.n_value[pvptr]=sum;return prod;};libbcmath._bc_shift_addsub=function(accum,val,shift,sub){var accp,valp;var count,carry;count=val.n_len;if(val.n_value[0]===0){count--;}
if(!(accum.n_len+accum.n_scale>=shift+count)){throw new Error("len + scale < shift + count");}
accp=accum.n_len+accum.n_scale-shift-1;valp=val.n_len=1;carry=0;if(sub){while(count--){accum.n_value[accp]-=val.n_value[valp--]+carry;if(accum.n_value[accp]<0){carry=1;accum.n_value[accp--]+=libbcmath.BASE;}else{carry=0;accp--;}}
while(carry){accum.n_value[accp]-=carry;if(accum.n_value[accp]<0){accum.n_value[accp--]+=libbcmath.BASE;}else{carry=0;}}}else{while(count--){accum.n_value[accp]+=val.n_value[valp--]+carry;if(accum.n_value[accp]>(libbcmath.BASE-1)){carry=1;accum.n_value[accp--]-=libbcmath.BASE;}else{carry=0;accp--;}}
while(carry){accum.n_value[accp]+=carry;if(accum.n_value[accp]>(libbcmath.BASE-1)){accum.n_value[accp--]-=libbcmath.BASE;}else{carry=0;}}}
return true;};libbcmath._bc_rec_mul=function(u,ulen,v,vlen,full_scale){var prod;var u0,u1,v0,v1;var u0len,v0len;var m1,m2,m3,d1,d2;var n,prodlen,m1zero;var d1len,d2len;if((ulen+vlen)<libbcmath.MUL_BASE_DIGITS||ulen<libbcmath.MUL_SMALL_DIGITS||vlen<libbcmath.MUL_SMALL_DIGITS){return libbcmath._bc_simp_mul(u,ulen,v,vlen,full_scale);}
n=Math.floor((libbcmath.MAX(ulen,vlen)+1)/2);if(ulen<n){u1=libbcmath.bc_init_num();u0=libbcmath.new_sub_num(ulen,0,u.n_value);}else{u1=libbcmath.new_sub_num(ulen-n,0,u.n_value);u0=libbcmath.new_sub_num(n,0,u.n_value+ulen-n);}
if(vlen<n){v1=libbcmath.bc_init_num();v0=libbcmath.new_sub_num(vlen,0,v.n_value);}else{v1=libbcmath.new_sub_num(vlen-n,0,v.n_value);v0=libbcmath.new_sub_num(n,0,v.n_value+vlen-n);}
libbcmath._bc_rm_leading_zeros(u1);libbcmath._bc_rm_leading_zeros(u0);u0len=u0.n_len;libbcmath._bc_rm_leading_zeros(v1);libbcmath._bc_rm_leading_zeros(v0);v0len=v0.n_len;m1zero=libbcmath.bc_is_zero(u1)||libbcmath.bc_is_zero(v1);d1=libbcmath.bc_init_num();d2=libbcmath.bc_init_num();d1=libbcmath.bc_sub(u1,u0,0);d1len=d1.n_len;d2=libbcmath.bc_sub(v0,v1,0);d2len=d2.n_len;if(m1zero){m1=libbcmath.bc_init_num();}else{m1=libbcmath._bc_rec_mul(u1,u1.n_len,v1,v1.n_len,0);}
if(libbcmath.bc_is_zero(d1)||libbcmath.bc_is_zero(d2)){m2=libbcmath.bc_init_num();}else{m2=libbcmath._bc_rec_mul(d1,d1len,d2,d2len,0);}
if(libbcmath.bc_is_zero(u0)||libbcmath.bc_is_zero(v0)){m3=libbcmath.bc_init_num();}else{m3=libbcmath._bc_rec_mul(u0,u0.n_len,v0,v0.n_len,0);}
prodlen=ulen+vlen+1;prod=libbcmath.bc_new_num(prodlen,0);if(!m1zero){libbcmath._bc_shift_addsub(prod,m1,2*n,0);libbcmath._bc_shift_addsub(prod,m1,n,0);}
libbcmath._bc_shift_addsub(prod,m3,n,0);libbcmath._bc_shift_addsub(prod,m3,0,0);libbcmath._bc_shift_addsub(prod,m2,n,d1.n_sign!=d2.n_sign);return prod;};libbcmath.bc_sub=function(n1,n2,scale_min){var diff;var cmp_res,res_scale;if(n1.n_sign!=n2.n_sign){diff=libbcmath._bc_do_add(n1,n2,scale_min);diff.n_sign=n1.n_sign;}else{cmp_res=libbcmath._bc_do_compare(n1,n2,false,false);switch(cmp_res){case-1:diff=libbcmath._bc_do_sub(n2,n1,scale_min);diff.n_sign=(n2.n_sign==libbcmath.PLUS?libbcmath.MINUS:libbcmath.PLUS);break;case 0:res_scale=libbcmath.MAX(scale_min,libbcmath.MAX(n1.n_scale,n2.n_scale));diff=libbcmath.bc_new_num(1,res_scale);libbcmath.memset(diff.n_value,0,0,res_scale+1);break;case 1:diff=libbcmath._bc_do_sub(n1,n2,scale_min);diff.n_sign=n1.n_sign;break;}}
return diff;};function bcadd(left_operand,right_operand,scale){var first,second,result;if(typeof(scale)=='undefined'){scale=libbcmath.scale;}
scale=((scale<0)?0:scale);first=libbcmath.bc_init_num();second=libbcmath.bc_init_num();result=libbcmath.bc_init_num();first=libbcmath.php_str2num(left_operand.toString());second=libbcmath.php_str2num(right_operand.toString());result=libbcmath.bc_add(first,second,scale);if(result.n_scale>scale){result.n_scale=scale;}
return result.toString();}
function bcsub(left_operand,right_operand,scale){var first,second,result;if(typeof(scale)=='undefined'){scale=libbcmath.scale;}
scale=((scale<0)?0:scale);first=libbcmath.bc_init_num();second=libbcmath.bc_init_num();result=libbcmath.bc_init_num();first=libbcmath.php_str2num(left_operand.toString());second=libbcmath.php_str2num(right_operand.toString());result=libbcmath.bc_sub(first,second,scale);if(result.n_scale>scale){result.n_scale=scale;}
return result.toString();}
function bccomp(left_operand,right_operand,scale){var first,second;if(typeof(scale)=='undefined'){scale=libbcmath.scale;}
scale=((scale<0)?0:scale);first=libbcmath.bc_init_num();second=libbcmath.bc_init_num();first=libbcmath.bc_str2num(left_operand.toString(),scale);second=libbcmath.bc_str2num(right_operand.toString(),scale);return libbcmath.bc_compare(first,second,scale);}
function bcscale(scale){scale=parseInt(scale,10);if(isNaN(scale)){return false;}
if(scale<0){return false;}
libbcmath.scale=scale;return true;}
function bcdiv(left_operand,right_operand,scale){var first,second,result;if(typeof(scale)=='undefined'){scale=libbcmath.scale;}
scale=((scale<0)?0:scale);first=libbcmath.bc_init_num();second=libbcmath.bc_init_num();result=libbcmath.bc_init_num();first=libbcmath.php_str2num(left_operand.toString());second=libbcmath.php_str2num(right_operand.toString());result=libbcmath.bc_divide(first,second,scale);if(result===-1){throw new Error(11,"(BC) Division by zero");}
if(result.n_scale>scale){result.n_scale=scale;}
return result.toString();}
function bcmul(left_operand,right_operand,scale){var first,second,result;if(typeof(scale)=='undefined'){scale=libbcmath.scale;}
scale=((scale<0)?0:scale);first=libbcmath.bc_init_num();second=libbcmath.bc_init_num();result=libbcmath.bc_init_num();first=libbcmath.php_str2num(left_operand.toString());second=libbcmath.php_str2num(right_operand.toString());result=libbcmath.bc_multiply(first,second,scale);if(result.n_scale>scale){result.n_scale=scale;}
return result.toString();}
function bcround(val,precision){var x;x='0.'+Array(precision+1).join('0')+'5';if(val.toString().substring(0,1)=='-'){x='-'+x;}
r=bcadd(val,x,precision);return r;}

/**
 * Decimal Number Object
 *
 * Designed to be an OO Number Object to replace basic mathematics in JavaScript
 * Requires the "bcmath" javascript library (https://sourceforge.net/projects/bcmath-js  - see "bcmath-min.js")
 * Licence is BSD licence, bcmath is LGPL
 *
 * Example: var x=new DecimalNumber('123.456', 3); // create 3dp number, any operations will be calculated then rounded to 3dp
 *          x.add('5'); // add 5 to our number
 *          x.sub('5').mul('5');    // subtract 5, then multiply by 5
 *          alert(x);               // display the number (can also use x.toString() if needed)
 *
 *          Arguements can be passed in formula method too (but are applicable to std floating point errors).. ie:
 *          x = new DecimalNumber('5+5', 2);
 *          x.add('3/4');
 *          x.toString(); // returns 10.75
 */
 
function DecimalNumber(num,precision){if(typeof(precision)=='undefined'){precision=0;}
if(typeof(num)=='undefined'){num='0';}
this.getPi=function(precision){if(precision>37){alert('Note: this approximation is not accurate above 37 decimal places');}
return bcdiv('2646693125139304345','842468587426513207',precision);};this.toString=function(){return this._result;};this.floor=function(precision){this._result=bcadd(this._result,'0',0);return this;};this.ceil=function(precision){if(this._result.substr(0,1)=='-'){this._result=bcround(bcadd(this._result,'-0.5',1),0);}else{this._result=bcround(bcadd(this._result,'0.5',1),0);}
return this;};this.toFixed=function(precision){return bcround(this._result,precision);};this.valueOf=function(){return this._result;};this.abs=function(){if(this._result.substr(0,1)=='-'){this._result=this._result.substr(1,this._result.length-1);};return this;};this.toInt=function(){return parseInt(this.toFixed(0));};this.toFloat=function(){return parseFloat(this._result);};this.add=function(operand){this._result=bcround(bcadd(this._result,this._parseNumber(operand),this._precision+2),this._precision);return this;};this.sub=function(operand){return this.subtract(operand);};this.subtract=function(operand){this._result=bcround(bcsub(this._result,this._parseNumber(operand),this._precision+2),this._precision);return this;};this.mul=function(operand){return this.multiply(operand);};this.multiply=function(operand){this._result=bcround(bcmul(this._result,this._parseNumber(operand),this._precision+2),this._precision);return this;};this.div=function(operand){return this.divide(operand);};this.divide=function(operand){this._result=bcround(bcdiv(this._result,this._parseNumber(operand),this._precision+2),this._precision);return this;};this.round=function(precision){this._result=bcround(this._result,precision);return this;};this.setPrecision=function(precision){this._precision=precision;this.round(precision);return this;};this._parseNumber=function(num){var tmp,r;tmp=num.toString().replace(/[^0-9\-\.]/g,'');if(tmp===''){return'0';}
return tmp;};this.reset=function(num){if(typeof(num)=='undefined'){num=0;}
this._result=bcround(num,this._precision);return this;}
this._precision=precision;this._result=bcround(this._parseNumber(num),this._precision);};function TestFloatingPointProblems(){var x=0;x+=0.1;x+=0.7;x=x*10;x=Math.floor(x).toString();if(x==='8'){alert("Wow! Result is correct, your browser doesn't have the floating point problems... cool :)");}else{alert("Well, apparently your browser can't work out Floor((0.1 + 0.7) * 10).. it thinks the answer is: "+x+", the correct answer is of course 8.");}
var y=new DecimalNumber(0,1).add('0.1').add('0.7').multiply('10').floor().toString();if(y==='8'){alert('Howver, The DecimalNumber Library worked it out fine.. it figured out the maths as expected :)');}else{alert("Odd, apparently the DecimalNumber library can't work it out either.. must be a problem somewhere :/");}
var browserPi=(2646693125139304345/842468587426513207).toFixed(20);if(browserPi=='3.14159265358979323846'){alert('Your browser calculates PI correctly to 20dp.. well done');}else{alert('Your browser calculates PI WRONG.. it is.. '+bcsub('3.14159265358979323846',browserPi,20)+' off at 20dp');}
var decNumPi=new DecimalNumber(0,20);decNumPi=decNumPi.reset('2646693125139304345').divide('842468587426513207').toString();if(decNumPi=='3.14159265358979323846'){alert('The DecimalNumber Library calculates PI correctly to 20dp... of course :)');}else{alert('Odd, the DecimalNumber Library calculated PI WRONG.. it is..'+bcsub('3.14159265358979323846',browserPi,20)+' off at 20dp');}
var decNumPi=new DecimalNumber(0,38);decNumPi=decNumPi.reset('2646693125139304345').divide('842468587426513207').toString();if(decNumPi=='3.14159265358979323846264338327950288418'){alert('The DecimalNumber Library calculates PI correctly to 38dp... of course :)');}else{alert('Odd, the DecimalNumber Library calculated PI WRONG.. it is..'+bcsub('3.14159265358979323846264338327950288418',decNumPi,38)+' off at 38dp');}
var decNumPi=new DecimalNumber();decNumPi.getPi(1000000);decNumPi=null;alert('done');};