(function ($) {
    $.fn.extend({
        ClassyQR: function (x) {
            var c = {
                baseUrl: 'http://chart.apis.google.com/chart?cht=qr&chs=',
                size: 80,
                create: false,
                number: null,
                email: null,
                subject: null,
                latitude: null,
                longitude: null,
                address: null,
                name: null,
                url: null,
                alt: 'QR kodu',
                note: null,
                encoding: 'UTF-8',
                type: 'text',
                text: 'escort34bayanist.com'
            };
            var b = $.extend(c, x);
            return this.each(function () {
                var d = $(this);
                var url = b.baseUrl + b.size + 'x' + b.size + '&choe=' + b.encoding + '&chl=';
                switch (b.type) {
                    case 'contact':
                        url = url + 'MECARD:N:' + b.name + ';GSM:' + b.number +';WEB:' + b.url +';EPOSTA:' + b.email + ';ADRES:' + b.address + ';NOT:' + b.note + ';';
                        break;
                    case 'wifi':
                        url = url + 'WIFI:S:' + b.ssid + ';T:' + b.auth + ';P:' + b.password +';';
                        break;
                    case 'location':
                        url = url + 'geo:' + b.latitude + ',' + b.longitude;
                        break;
                    case 'call':
                        url = url + 'tel:' + b.number;
                        break;
                    case 'email':
                        url = url + 'mailto:' + b.email + ':' + b.subject +':' + b.text;
                        break;
                    case 'sms':
                        url = url + 'smsto:' +  b.number + ':' + b.text;
                        break;
                    case 'url':
                        url = url + b.url;
                        break;
                    case 'text':
                    default:
                        url = url + b.text;
                        break;
                }
                if (b.create) {
                    d.append('<img src="' + url + '" alt="' + b.alt + '" />');
                }
                else {
                    d.attr('src', url);
                }
            });
        }
    });
})(jQuery);