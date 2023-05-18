# class Unit :
#     def __init__(se,name,hp,damage) : #파이썬에서 __init__은 생성자 함수 
#         se.name = name  #자바스크립트에서의 this가 여기선 파라미터 첫번쨰 se이다.
#         se.hp = hp
#         se.damage = damage
#         print('{0}유닛이 생성 되었습니다.'.format(se.name))
#         print('체력{0},공격력{1}'.format(se.hp , se.damage))

# marine1 = Unit('마린',40,5)
# marine2 = Unit('저그',50,4)

# #만들어놓은 파라미터와 선언하는 파라미터의 갯수가 동일해야 된다.

# marine3 = Unit('병신정훈',20,0)

# print('유닛이름 : {0},공격력 : {1}'.format(marine3.name ,marine3.damage))

# marine4 = Unit('정신병자정훈',40,123)
# marine4.charac = True

# #기존의 class에 추가로 외부에서 변수를 추가 이렇게 하면 marine4에만 값이 들어가 있다.
# if marine4.charac == True :
#     print('{0}은 현재 완벽한 쓰레기가 되었습니다.'.format(marine4.name)) 

class Attackunit :
    def __init__(self,name,hp,damage) :
        self.name = name
        self.hp = hp
        self.damage=damage
    
    def attack(self,location):
        print('{0} : {1} 방향으로 적군을 공격합니다.공격력 {2}'\
              .format(self.name,location,self.damage)) # 클래스 내부에 선언된 변수를 그대로 활용한다.
        
    def damaged(self,damage) :
        print('{0} : {1} 데미지를 입었습니다.'.format(self.name, damage))
        self.hp -= damage
        print('{0} : 현재 체력은  {1}입니다.'.format(self.name ,self.hp))
        if self.hp <=0 :
            print('{0} : 파괴되었습니다.'.format(self.name))


#파이어뱃  : 공격유닛 ,화염방사기
firebat1 = Attackunit('피이어뱃',50,16)
firebat1.attack('5시')

firebat1.damaged(25)
firebat1.damaged(25)

        
