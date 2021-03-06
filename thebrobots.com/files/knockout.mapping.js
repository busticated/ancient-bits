﻿// Knockout Mapping plugin v0.5
// (c) 2010 Steven Sanderson, Roy Jacobs - http://knockoutjs.com/
// License: Ms-Pl (http://www.opensource.org/licenses/ms-pl.html)
console.log("loading mapping");
ko.d = function (u, n) { for (var k = u.split("."), o = window, s = 0; s < k.length - 1; s++) o = o[k[s]]; o[k[k.length - 1]] = n }; ko.C = function (u, n, k) { u[n] = k };
(function () {
	function u() { ko.l = function (a, c, b) { b = b || {}; b.B = true; a = new x(a, c, b); a.u = x; A.push(a); return a } } function n(a) { if (a && typeof a === "object" && a.constructor == (new Date).constructor) return "date"; return typeof a } function k(a, c, b) { y || (A = []); y++; a = o(a, c, b); y--; return a } function o(a, c, b, d, f, p) {
		var h = ko.a.c(c) instanceof Array; if (ko.b.n(a)) b = ko.a.c(a)[q]; d = d || new B; if (d.h(c)) return a; f = f || ""; if (h) {
			p = []; var g = function (e) { return e }; if (b[f] && b[f].key) g = b[f].key; if (!ko.D(a)) {
				a = ko.M([]); a.J = function (e) {
					var i =
typeof e == "function" ? e : function (j) { return j === g(e) }; return a.remove(function (j) { return i(g(j)) })
				}; a.K = function (e) { var i = v(e, g); return a.remove(function (j) { return ko.a.e(i, g(j)) != -1 }) }; a.G = function (e) { var i = typeof e == "function" ? e : function (j) { return j === g(e) }; return a.q(function (j) { return i(g(j)) }) }; a.H = function (e) { var i = v(e, g); return a.q(function (j) { return ko.a.e(i, g(j)) != -1 }) }; a.I = function (e) { var i = v(a(), g); e = g(e); return ko.a.e(i, e) } 
			} h = v(ko.a.c(a), g).sort(); var r = v(c, g).sort(); h = ko.a.A(h, r); r = [];
			for (var z = 0, D = h.length; z < D; z++) { var t = h[z]; switch (t.status) { case "added": var l = w(ko.a.c(c), t.value, g), m = ko.a.c(o(undefined, l, b, d, f, a)); l = ko.a.e(ko.a.c(c), l); r[l] = m; break; case "retained": l = w(ko.a.c(c), t.value, g); m = w(a, t.value, g); o(m, l, b, d, f, a); l = ko.a.e(ko.a.c(c), l); r[l] = m; break; case "deleted": m = w(a, t.value, g); a.remove(m) } p.push({ event: t.status, item: m }) } a(r); b[f] && b[f].k && ko.a.w(p, function (e) { b[f].k(e.event, e.item) })
		} else if (n(c) == "object" && c !== null && c !== undefined) {
			if (!a) if (b[f] && b[f].create instanceof
Function) { u(); m = b[f].create({ data: c, parent: p }); ko.l = x; return m } else a = {}; d.save(c, a); C(c, function (e) { var i = d.h(c[e]); a[e] = i ? i : o(a[e], c[e], b, d, e, a) })
		} else switch (n(c)) { case "function": a = c; break; default: if (ko.F(a)) a(ko.a.c(c)); else a = ko.L(ko.a.c(c)) } return a
	} function s(a, c) { var b; if (c) b = c(a); b || (b = a); return ko.a.c(b) } function w(a, c, b) { a = ko.a.v(ko.a.c(a), function (d) { return s(d, b) == c }); if (a.length != 1) throw Error("When calling ko.update*, the key '" + c + "' was not found or not unique!"); return a[0] } function v(a,
c) { return ko.a.z(ko.a.c(a), function (b) { return c ? s(b, c) : b }) } function C(a, c) { if (a instanceof Array) for (var b = 0; b < a.length; b++) c(b); else for (b in a) c(b) } function B() { var a = [], c = []; this.save = function (b, d) { var f = ko.a.e(a, b); if (f >= 0) c[f] = d; else { a.push(b); c.push(d) } }; this.h = function (b) { b = ko.a.e(a, b); return b >= 0 ? c[b] : undefined } } ko.b = {}; var q = "__ko_mapping__", y = 0, x = ko.l, A; ko.b.m = function (a, c, b) {
	if (arguments.length == 0) throw Error("When calling ko.fromJS, pass the object you want to convert."); var d = c; d = d ||
{}; if (d.create instanceof Function || d.key instanceof Function || d.k instanceof Function) d = { "": d }; c = d; d = k(b, a, c); d[q] = d[q] || {}; d[q] = c; return d
}; ko.b.r = function (a, c) { var b = ko.a.s(a); return ko.b.m(b, c) }; ko.b.n = function (a) { return (a = ko.a.c(a)) && a[q] }; ko.b.p = function (a, c) {
	if (arguments.length < 2) throw Error("When calling ko.updateFromJS, pass: the object to update and the object you want to update from."); if (!a) throw Error("The object is undefined."); if (!a[q]) throw Error("The object you are trying to update was not created by a 'fromJS' or 'fromJSON' mapping.");
	return k(a, c, a[q])
}; ko.b.t = function (a, c, b) { c = ko.a.s(c); return ko.b.p(a, c, b) }; ko.b.o = function (a, c) { if (arguments.length == 0) throw Error("When calling ko.mapping.toJS, pass the object you want to convert."); c = c || {}; c.f = c.f || []; if (!(c.f instanceof Array)) c.f = [c.f]; c.f.push(q); return ko.b.i(a, function (b) { return ko.a.c(b) }, c) }; ko.b.toJSON = function (a, c) { var b = ko.b.o(a); return ko.a.N(b, c) }; ko.b.i = function (a, c, b) {
	b = b || {}; b.j = b.j || new B; var d, f = ko.a.c(a); if (n(f) == "object" && f !== null && f !== undefined) {
		c(a, b.g);
		d = f instanceof Array ? [] : {}
	} else return c(a, b.g); b.j.save(a, d); var p = b.g; C(f, function (h) { if (!(b.f && ko.a.e(b.f, h) != -1)) { var g = f[h]; b.g = p || ""; if (f instanceof Array) { if (p) b.g += "[" + h + "]" } else { if (p) b.g += "."; b.g += h } switch (n(ko.a.c(g))) { case "object": case "undefined": var r = b.j.h(g); d[h] = r !== undefined ? r : ko.b.i(g, c, b); break; default: d[h] = c(g, b.g) } } }); return d
}; ko.d("ko.mapping", ko.b); ko.d("ko.mapping.fromJS", ko.b.m); ko.d("ko.mapping.fromJSON", ko.b.r); ko.d("ko.mapping.isMapped", ko.b.n); ko.d("ko.mapping.toJS",
ko.b.o); ko.d("ko.mapping.toJSON", ko.b.toJSON); ko.d("ko.mapping.updateFromJS", ko.b.p); ko.d("ko.mapping.updateFromJSON", ko.b.t); ko.d("ko.mapping.visitModel", ko.b.i)
})();