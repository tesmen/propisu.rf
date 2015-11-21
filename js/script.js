function digtotex11t(dig){
    this.words = {
        m3:[['тысяча','тысячи','тысяч'], ['миллион','миллиона','миллионов'], ['миллиард', 'миллиарда', 'миллиардов']],
        m2:['сто','двести','триста','четыреста','пятьсот','шестьсот','семьсот','восемьсот','девятьсот'],
        m1:['десять','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемдесят','девяносто'],
        m0:['один','два','три','четыре','пять','шесть','семь','восемь','девять','десять'],
        f0:['одна','две'],
        l0:['десять', 'одиннадцать','двенадцать','тринадцать','четырнадцать','пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать']
    };
    this.dim = function(dig, power, words){
        var result = '';
        var pow = Math.floor(dig/Math.pow(10, power)) % Math.pow(10,3);
        if(!pow) return result;
        var n2 =  Math.floor(pow/100);
        var n1 =  Math.floor(pow%Math.pow(10,2)/10);
        var n0 =  Math.floor(pow%10);
        var s1 = (n1 > 0)?' ':'';
        var s0 = (n0 > 0)?' ':'';
        var get_n = function(){
            switch(power){
                case 0:
                case 6: 
                case 9: 
                    result +=s0+words.m0[n0-1];
                break;
                case 3:
                    if(n0 < 3){
                        result +=s0+words.f0[n0-1];
                    }else{
                        result +=s0+words.m0[n0-1];
                    }
                break;
            }
        };
        if(n2 > 0){
            result += words.m2[n2-1];
        }
        if(n1 > 0){
            if(n1 > 1){
                result +=s1+words.m1[n1-1];
                if(n0 > 0) get_n();
            }
            else{
                result +=s1+words.l0[n0]; 
            }            
        }else{
            if(n0 > 0) get_n();
        }        
        if(power){            
            var d = (power-3)/3;
            if((d == 0) && (n0+n1*10 >= 11 && n0+n1*10 <= 14)){
                result +=' '+words.m3[0][2];
            }else if(n0 == 1){
                result +=' '+words.m3[d][0];
            }
            else if((n0 >= 2) && (n0 <= 4)){
                result +=' '+words.m3[d][1];
            }
            else if((n0 == 0) || (n0 >= 5 && n0 <= 9)){
                result +=' '+words.m3[d][2];
            }
        }
        return result;
    }       
    this.result = '';
    for(var i = 9 ; i > -1; i-=3){
        this.result += this.dim(dig, i, this.words) + ' ';
    }
    return this.result.replace(/[\s]{2,}/ig,' ').trim();
}

