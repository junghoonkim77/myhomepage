class Unit :
    def __init__(self):
        print('unit 생성자')

class Flyable:
    def __init__(self):
        print('flyable생성자')

class FlyableUnit(Unit,Flyable) :
    def __init__(self):
        super().__init__()

#드랍십

dropship = FlyableUnit()

#이렇게 super로 상속하면 처음것만 실행된다. 그래서 명시적으로 클래스명.__init__이걸로 하는게 좋다.

