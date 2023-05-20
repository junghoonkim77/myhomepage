class Unit :
    def __init__(self,name,hp,speed) : #파이썬에서 __init__은 생성자 함수 
        self.name = name  #자바스크립트에서의 this가 여기선 파라미터 첫번쨰 se이다.
        self.hp = hp
        self.speed = speed
        print('{0} 유닛이 생성되었습니다.'.format(name))
        

    def move(self,location):
        print('[지상 유닛 이동]')
        print('{0} : {1} 방향으로 이동합니다. [속도 {2}]'\
              .format(self.name,location,self.speed))
   
    def damaged(self,damage) :
        print('{0} : {1} 데미지를 입었습니다.'.format(self.name, damage))
        self.hp -= damage
        print('{0} : 현재 체력은  {1}입니다.'.format(self.name ,self.hp))
        if self.hp <=0 :
            print('{0} : 파괴되었습니다.'.format(self.name))

    
class Attackunit(Unit) :
    def __init__(self,name,hp,speed,damage) :
        Unit.__init__(self,name,hp,speed) #Unit클래스를 상속 받은것 
        self.damage=damage
    
    def attack(self,location):
        print('{0} : {1} 방향으로 적군을 공격합니다.공격력 {2}'\
              .format(self.name,location,self.damage)) # 클래스 내부에 선언된 변수를 그대로 활용한다.
        
class Marine(Attackunit) :
    def __init__(self) :
        Attackunit.__init__(self,'마린',40,1,5)
    
    #스팀팩 : 일정 시간 동안 이동 및 공격 속도를 증가 , 체력 10 감소 

    def stimpack(self) :
        if self.hp >10 :
            self.hp -= 10
            print('{0} :스팀팩을 사용합니다.(Hp 10 감소)'.format(self.name))
        else :
            print('{0} : 체력이 부족해 스팀팩을 사용하지 않습니다.'.format(self.name))


#탱크
class Tank(Att)


  


#파이어뱃  : 공격유닛 ,화염방사기
firebat1 = Attackunit('피이어뱃',50,16,30)
firebat1.attack('5시')

firebat1.damaged(25)
firebat1.damaged(25)

#드랍십  : 공중 유닛, 수송기, 마린 / 파이어 뱃등을 수송해주는 유닛

class Flyable :
    def __init__(self,flying_speed) :
        self.flying_speed = flying_speed        
    def fly(self,name,location) :
        print('{0} : {1} 방향으로 날아갑니다.[속도 {2}]'\
              .format(name,location,self.flying_speed))
        
#공중 공격 유닛 클래스
class FlyableAttackUnit(Attackunit,Flyable) :
    def __init__(self,name,hp,damage,flying_speed) :
        Attackunit.__init__(self,name,hp,0,damage) #지상 스피드는 0으로 처리 
        Flyable.__init__(self,flying_speed)
        
    def move(self , location) :
        print('[공중 유닛 이동]')
        self.fly(self.name , location)

#발키리 : 공중 공격 유닛,한번에 14발 미사일 발사 
# valkyrie = FlyableAttackUnit('발키리',200,6,5)
# valkyrie.fly(valkyrie.name,'3시')

#벌쳐 : 지상 유닛 , 기동성이 좋음 

vulture = Attackunit('벌쳐',80,10,20)

#배틀크루저 : 공중 유닛 ,  체력 공격력 좋음

battlecruiser = FlyableAttackUnit('배틀크루저',500,25,3)

vulture.move('11시')

#battlecruiser.fly(battlecruiser.name , '3시')

# 단 위와 같이 지상유닛이면 move 공중 유닛이면 fly를 구분해서 써야 함으로 
# 복잡하다 이걸 해결하는 방법을 연산자 오버라이딩 이라고 한다.

battlecruiser.move('9시')

#건물   : pass 에 대해서 다룸 
#class BuildingUnit(Unit) :
    # def __init__(self,name,hp,location) :
    #     pass  # 아무것도 않고 일단 넘어 갈때 쓰는 방법

# #서플라이 디폿 : 건물1개 , 건물=8 유닛

# supply_depot = BuildingUnit('서플라이 디폿',500,'7시')

# def game_start() :
#     print('새로운 게임을 시작합니다.')

# def game_over() :
#     pass

# game_start()
# game_over()

#건물 super 공부

# class BuildingUnit(Unit) :
#     def __init__(self,name,hp,location) :
#       #  Unit.__init__(self,name,hp,0) init을 통해서 상속받거나 
#         super().__init__(name,hp,0) #super를 통해서 할수도 있으나 이경우 self를 제거해야됨
#         self.location = location

