from vietnam_number import w2n

def toNum(w) -> str:
    try:
        num = w2n(w)
        return num
    except ValueError as e:
        return '0';
