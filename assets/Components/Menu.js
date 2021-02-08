import React, {Fragment} from 'react';

const Menu = ({MenuClick, Category}) =>
{
    let ClassSite = 'Site Category ';
    let ClassAppli = 'Appli Category ';

    console.log('CATEGORY : '+Category);
    if(Category == 'Site')
    {
        ClassSite += ' Selected';
        ClassAppli = 'Appli Category';
    }
    if(Category == 'Appli')
    {
        ClassAppli += 'Selected';
        ClassSite = 'Site Category';

        console.log('ok');
    }

    return (
        <Fragment>

            <ul className="Menu">

                <li className={ClassSite} onClick={MenuClick} ><span className="CategoryTxt">Site web</span></li>
                <li className={ClassAppli} onClick={MenuClick}><span className="CategoryTxt">Application mobile</span></li>
            </ul>

        </Fragment>
    )
}

export default Menu;
