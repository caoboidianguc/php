function PartyAnimal () {
    this.x = 0;
    this.party = function () {
        console.log("so far " + this.x);
    }
}

anim = new PartyAnimal();

anim.party();
anim.party();
anim.party();
anim.party();