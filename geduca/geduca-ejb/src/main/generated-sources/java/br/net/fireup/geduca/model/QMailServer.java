package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMailServer is a Querydsl query type for MailServer
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMailServer extends EntityPathBase<MailServer> {

    private static final long serialVersionUID = -489742766L;

    public static final QMailServer mailServer = new QMailServer("mailServer");

    public final BooleanPath flagSsl = createBoolean("flagSsl");

    public final StringPath host = createString("host");

    public final StringPath nomeRemetente = createString("nomeRemetente");

    public final StringPath noSsl = createString("noSsl");

    public final StringPath remetente = createString("remetente");

    public final StringPath senha = createString("senha");

    public final StringPath ssl = createString("ssl");

    public QMailServer(String variable) {
        super(MailServer.class, forVariable(variable));
    }

    public QMailServer(Path<? extends MailServer> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMailServer(PathMetadata<?> metadata) {
        super(MailServer.class, metadata);
    }

}

