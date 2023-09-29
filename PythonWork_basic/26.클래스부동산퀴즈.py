class House :
    #매물 초기화 
    def __init__(self,location,h_type,deal_type,price,com_year) :
        self.location = location
        self.h_type = h_type
        self.deal_type = deal_type
        self.price = price
        self.com_year = com_year



    def show_detail(self):
              print('{0} {1} {2} {3} {4}'\
              .format(self.location, self.h_type , self.deal_type ,self.price, self.com_year))

house_test1 = House('강남','아파트','매매','10억','2010년')
house_test2 = House('마포','오피스텔','전세','5억','2007년')
house_test3 = House('송파','빌라','월세','500/50','2000년')

house_array = [house_test1,house_test2,house_test3]

print('총 {0}대의 매물이 있습니다.'.format(len(house_array)))
for homes in house_array :
      homes.show_detail()
